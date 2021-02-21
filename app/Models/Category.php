<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
        // カテゴリは複数のポストを持つ
        return $this->hasMany('App\Models\Post');
    }
}