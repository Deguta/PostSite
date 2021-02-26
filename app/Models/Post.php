<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name',
        'subject',
        'message',
        'category',
        'created_at'
    ];
    
    public function comments()
    {
        // 投稿は複数のコメントを持つ
        return $this->hasMany('App\Models\Comment');
    }

    public function scopeFuzzyNameMessage($query, $searchword)
{
    if (empty($searchword)) {
        return;
    }
 
    return $query->where(function ($query) use($searchword) {
        $query->orWhere('name', 'like', "%{$searchword}%")
              ->orWhere('subject', 'like', "%{$searchword}%")
              ->orWhere('category', 'like', "%{$searchword}%")
              ->orWhere('message', 'like', "%{$searchword}%");
    });
}

}
