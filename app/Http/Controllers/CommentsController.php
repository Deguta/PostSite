<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\Models\Comment;

use App\Http\Requests\CommentRequest;

class CommentsController extends Controller

{
    public function store(CommentRequest $request){

        $savedata = [
        'post_id' => $request->post_id,
        'name' => $request->name,
        'comment' => $request->comment,
    ];

    $comment = new Comment;
    $comment->fill($savedata)->save();

    return redirect()
    ->route('bulletin-board.show', [$savedata['post_id']])
    ->with('commentstatus','コメントを投稿しました');
    }

}

