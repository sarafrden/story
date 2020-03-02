<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends AbstractAPIModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'story_id', 'parent_id', 'body'];

    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    public function allowedAttributes()
    {
        return collect($this->attributes)
        ->filter(function($item, $key)
        {
            return !collect($this->hidden)->contains($key) && $key !== ' id';
        })->merge([
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                    ]
                );
    }
    public function type()
    {
        return 'Comment';
    }

}
