<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    /*shares with articles table*/
    public function articles() {
        return $this->belongsToMany(article::class);
    }
    /*pulls the fields through*/
    protected $fillable = [
        'title', 'content'
    ];
}
