<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(8);
    }

    public static function RecentPosts()
    {
        return $recent = Posts::orderBy('id', 'desc')->take(3)->get();
    }
}
