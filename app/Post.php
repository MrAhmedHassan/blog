<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //this names are the col in the database
    protected $fillable = ['title', 'description', 'creator','user_id'];

    // connect the post model with user model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
