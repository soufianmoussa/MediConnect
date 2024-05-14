<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
public function addpost(Request $request){
    return view("forum.postforum");
}
    public function index()
{
    $posts = Post::with('comments')->get();
    return view('forum.forum', compact('posts'));
}
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
    
        $post = new Post;
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->user_id = auth()->id(); // Assuming users are authenticated
        $post->save();
    
        return redirect()->route('forum.index')->with('success', 'Post created successfully.');
    }
}
