<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;
    protected $guarded=[];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image_path','image_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles(){
        return $this->belongsToMany(Role::class,'role_user','user_id','role_id');
    }
    public function checkPermissionAccess($permissionCheck){
        //b1 lấy quyen trong hẹ thong
        $roles = auth()->user()->roles;
        foreach ($roles as $role){
            $permission = $role->permissions;
            if($permission->contains('key_code',$permissionCheck)){
                return true;
            }

        }
//so sanh gia tri dua vao cua router hien tai có ton tại trong cac quyen minh lay dk hay k

        return false;
    }
}
