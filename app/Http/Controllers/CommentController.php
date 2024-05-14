<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'post_id' => 'required|exists:posts,id',
        'content' => 'required',
    ]);

    $comment = new Comment;
    $comment->post_id = $validatedData['post_id'];
    $comment->user_id = auth()->id(); // Assuming users are authenticated
    $comment->content = $validatedData['content'];
    $comment->save();

    return back()->with('success', 'Comment added successfully.');
}
}
