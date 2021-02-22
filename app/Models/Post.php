<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name',
        'subject',
        'message',
        'category_id'
    ];
    
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
