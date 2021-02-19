<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments()
    {
        // 投稿は複数のコメントを持つ
        return $this->hasMany('App\Models\Comment');
    }
 
    public function category()
    {
        // 投稿は1つのカテゴリーに属する
        return $this->belongsTo('App\Models\Category');
    }
}
