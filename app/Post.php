<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'user_id',
        'slug',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest'
        ]);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
