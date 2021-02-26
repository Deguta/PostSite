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
        'post_id',

        'name',
        'comment',
    ];
}
