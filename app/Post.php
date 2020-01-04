<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{

    use Sluggable;

    //this names are the col in the database
    protected $fillable = ['title', 'description', 'creator', 'user_id'];

    // connect the post model with user model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable()
    {
        return [
            'slug_title' => [
                'source' => 'title'
            ]
        ];
    }
}
