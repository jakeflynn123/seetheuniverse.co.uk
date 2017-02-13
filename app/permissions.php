<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    /*pulls these field through*/
    protected $fillable = [
        'name', 'detail',
    ];
    /*shares with roles table*/
    public function roles() {
        return $this->belongsToMany(roles::class);
    }
}