<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    /*shares with categories table*/
    public function categories()
    {
        return $this->belongsToMany(categories::class);
    }

    /*gives permissions to permission table*/
    public function giveCategoryTo(categories $categories)
    {
        return $this->category->sync($categories);
    }



    /*shares with comments table*/
    public function comments()
    {
        return $this->belongsToMany('App\comments');
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
