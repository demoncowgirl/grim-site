<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //  public function show(Request $request, $id)
    // {
    //     $value = $request->session()->get('key');
    //
    //     //
    // }


    //     public function roles()
    // {
    //     return $this->belongsToMany('App\Role');
    // }
    //
    //     public function isAdmin()
    // {
    //     foreach ($this->roles()->get() as $role)
    //     {
    //         if ($role->name == 'Admin')
    //         {
    //             return true;
    //         }
    //     }
    //     return false;
    // }
}
