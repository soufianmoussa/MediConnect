<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments.user')->get();
        return view('forum.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load('user', 'comments.user');
        return view('forum.show', compact('post'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->id();
        $post->save();

        return redirect()->route('forum.index')->with('success', 'Post created successfully.');
    }

    public function storeComment(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->post_id = $post->id;
        $comment->user_id = auth()->id();
        $comment->save();

        return redirect()->route('forum.show', $post)->with('success', 'Comment added successfully.');
    }
}
