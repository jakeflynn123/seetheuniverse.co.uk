<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    /*shares with categories table*/
    public function categories()
    {
        return $this->belongsToMany('App\Categories');
    }
    /*shares with comments table*/
    public function comments()
    {
        return $this->belongsToMany('App\Response');
    }
    /*shares with user table*/
    public function user()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
    /*pulls the fields through*/
    protected $fillable = [
        'title', 'content'
    ];
}
