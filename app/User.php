<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
class User extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $connection = 'mysql';
    protected $primaryKey = 'Id';
    protected $table = 'user';
    
    public $timestamps = false;
    protected $fillable = [
        'Id', 'first_name', 'last_name', 'username', 'email', 'password', 'created_at', 'last_update_time', 'is_active'
    ];

   public function includeAsJsString($template){
        $string = view($template);
        return str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$string), "\0..\37'\\")));
    }
}
