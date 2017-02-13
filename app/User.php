<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*pulls the fields through*/
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    /*hides fields*/
    protected $hidden = [
        'password', 'remember_token',
    ];


    /*shares with roles table*/
    public function roles() {
        return $this->belongsToMany(roles::class);
    }

    /*
     *   check if a role is attached to a user
     */
    public function hasRole($role) {
        if (is_string($role)){
            return $this->roles->contains('name', $role);
        }
        return !! $role->intersect($this->roles)->count();
    }

    /*
     *  assign a role to a user
     */
    public function assignRole($role) {
        return $this->roles()->sync(
            roles::whereName($role)->firstOrFail()
        );
    }
}