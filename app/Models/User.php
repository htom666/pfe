<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
        $role = $this->roles;

        if (!$role) {
            return false;
        }

        foreach($role->permissions as $permission){
           // dd($permission);
            if(is_string($permissions) && strcmp($permission,$permissions) == 0){
                return true;

            } else if (is_string($permissions) && strcmp($permission,$permissions) == 0)
            {
                return true;
            }
        }
        return false;
        }
    public function hasRole1($role)
    {
      if ($this->roles()->where('name', $role)->first()) {
        return true;
      }
      return false;
    }


public function hasRole2($permiession)
{
    $role = $this->roles;

    if (!$role) {
        return false;
    } else{
        

        
            
            foreach($role->permissions as $p){
            if($p == $permiession)
                        return true;
               
             
        } return false;
    
   
    //  $checks = Role::all();

    //     foreach ($checks as $check){
    //         foreach($check->permissions as $p){
    //              if($p == $permiession)
    //                     return true;
               
    //          }
    //  }
     
                    
    }
}
}
