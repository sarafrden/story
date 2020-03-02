<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Laravelista\Comments\Commentable;

class Story extends AbstractAPIModel
{
    //use Commentable;

    protected $fillable = [
        'title', 'description',
    ];

    public function Mentor()
    {
        return $this->belongsTo(Mentor::class);
    }


    public function type()
    {
        return 'Story';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
