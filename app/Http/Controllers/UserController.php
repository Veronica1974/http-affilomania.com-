<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function read(){
        $data = \App\User::all()->keyBy('last_update_time');
       
        return view('showdata', ['users' => $data]);
       
    }
    
        
    public function formValidationCreate(Request $request){
       
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|min:1|max:45',
            'last_name' => 'required|min:1|max:45',
            'username' => 'required|min:3|max:45|unique:user',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:8|max:20|regex:/(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W\S])[A-Za-z_\d\W\S]{8,20}$)/i',
         
        ]);
        
        
        if ($validator->passes()) {
            $user_model = new User();
            $user_model->first_name= $request['first_name'];
            $user_model->last_name= $request['last_name'];
            $user_model->username = $request['username'];
            $user_model->email =  $request['email'];
            $user_model->password =  md5($request['password']);
            $user_model->is_active =  $request['is_active'];
            $user_model->save();
            $data = \App\User::where('username', $request['username'])->get();
            
            return response()->json(['success'=>'Added new records.',
                'data' => $data
                
            ]);
           
        }
         
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    
    public function formValidationUpdate(Request $request){
        
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|min:1|max:45',
            'last_name' => 'required|min:1|max:45',
            'username' => 'required|min:3|max:45|unique:user,username,' . $request['Id'] . ',Id',
            'email' => 'required|email|unique:user,email, '. $request['Id'] . ',Id',
            
        ]);
        
        
        if ($validator->passes()) {
            $user_model = new User();
            $user_model->exists = true;
            $user_model->first_name= $request['first_name'];
            $user_model->last_name= $request['last_name'];
            $user_model->username = $request['username'];
            $user_model->email =  $request['email'];
          //  $user_model->password =  md5($request['password']);
            $user_model->is_active =  $request['is_active'];
            $user_model->Id =  $request['Id'];
            $user_model->last_update_time = new \DateTime();
            $user_model->save();
            return response()->json(['success'=>'Updated this records.', 'data' => $request->all()]);
            
        }
        
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    
    public function deleteUser(Request $request){
        $res = User::where('Id',$request['Id'])->delete();
        if ($res){
            $data=[ 'status'=>'1','msg'=>'success','Id' => $request['Id'] ];
        }else{
            $data=['status'=>'0', 'msg'=>'fail'
            ];
            return response()->json($data);
        }
    }
   
}