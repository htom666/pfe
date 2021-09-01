<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function hasRole($permissions)
    {
        $role = $this->role;
        if (!$role) {
            return false;
        }
        foreach($role->permissions as $permission){
            if(is_array($permission)&& in_array($permission,$permissions)){
                return true;
            }else if (is_string($permissions)&& strcmp($permissions,$permission) == 0)
            {
                return true;
            }
        }
        return false;
    }
}
