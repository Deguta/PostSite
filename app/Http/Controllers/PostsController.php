<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10); //最新の投稿を上から表示と１ページに10投稿を表示する
                return view('bulletin-boards.index',['posts'=> $posts]);
    }

    public function show(Request $request, $id)
{
    $post = Post::findOrFail($id);

    return view('bulletin-boards.show', [
        'post' => $post,
    ]);
}
}
