<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function addComment(Request $request, $id) {
        $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comments();
        $comment->comment = $request->comment;
        $comment->user_id = auth()->id();
        $comment->post_id = $id;
        $comment->save();

        return redirect()->back();
    }
}
