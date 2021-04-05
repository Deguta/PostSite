<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class PostsController extends Controller {
    public function index(Request $request) {
        $searchword = $request->searchword;
        $posts = Post::orderBy('created_at', 'desc')
        ->Search($searchword)
        ->paginate(10); //最新の投稿を上から表示と１ページに10投稿を表示する

        return view('bulletin-boards.index',['posts'=> $posts,'searchword' => $searchword]);
    }



    public function create() {
        $study = Config::get('category.$language');

        return view('bulletin-boards.create',
        ['study' => $study,]);

    }

    /*
     * バリデーション、登録データの整形など
     */
    public function store(PostRequest $request) {
        
        $savedata = [
            'name' => $request->name,
            'subject' => $request->subject,
            'category' => $request->category,
            'message' => $request->message,
        ];

        $post = new Post();
        $post->fill($savedata)->save();

        return redirect()->route('bulletin-board.index')->with('flash_message', '新規投稿しました');
    }



    public function show(Request $request, $id) {
    $post = Post::findOrFail($id);

    return view('bulletin-boards.show', ['post' => $post]);
    }

    // public function edit($id) {

    //     $id = DB::table('posts')
    //     ->select('name','subject','message')
    //     ->find($id);

    //     return view('bulletin-boards.edit', ['post'=> $id]);
    
    // }

    public function edit($id) {

    $study = Config::get('category.$language');

    $post = Post::findOrFail($id);

    return view('bulletin-boards.edit', ['post' => $post,'study' => $study]);
    }



    public function update(PostRequest $request) {

        $savedata = [
            'name' => $request->name,
            'subject' => $request->subject,
            'category' => $request->category,
            'message' => $request->message,
        ];

    
        $post = new Post;
        $post->fill($savedata)->save();
    
        return redirect()->route('bulletin-board.index')->with('flash_message', '投稿を更新しました');
    }


    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->comments()->delete(); // ←★コメント削除実行
        $post->delete();  // ←★投稿削除実行
        
        return redirect()->route('bulletin-board.index')->with('flash_message', '投稿を削除しました');
    }




}