<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post()
    {
        // コメントは1つの投稿に所属する
        return $this->belongsTo('App\Models\Post');
    }

    protected $fillable = [
        'name',
        'comment',
        'post_id',
    ];
}
