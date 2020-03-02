<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor extends AbstractAPIModel
{
    protected $fillable = [
        'name', 'contact_info'
    ];

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

    public function Story()
    {
        return $this->hasMany(Story::class);
    }
    public function type()
    {
        return 'Mentor';
    }

}
