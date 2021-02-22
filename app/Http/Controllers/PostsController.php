<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10); //最新の投稿を上から表示と１ページに10投稿を表示する
                return view('bulletin-boards.index',['posts'=> $posts]);
    }

    public function create()
    {
    return view('bulletin-boards.create');
    }
 
 
    /**
     * バリデーション、登録データの整形など
     */
    public function store(PostRequest $request)
    {
        $savedata = [
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
            'category_id' => $request->category_id,
        ];
    
        $post = new Post();
        $post->fill($savedata)->save();
    
        return redirect()->route('bulletin-board.index')->with('flash_message', '新規投稿しました');
    }

    public function show(Request $request, $id)
{
    $post = Post::findOrFail($id);

    return view('bulletin-boards.show', [
        'post' => $post,
    ]);
}
}
