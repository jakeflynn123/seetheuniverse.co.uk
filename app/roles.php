<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    /*pulls the fields through*/
    protected $fillable = [
        'name', 'detail',
    ];

    /*shares with the permissions table*/
    public function permissions()
    {
        return $this->belongsToMany(permissions::class);
    }

    /*gives permissions to permission table*/
    public function givePermissionTo(permissions $permissions)
    {
        return $this->permission->sync($permissions);
    }
}
