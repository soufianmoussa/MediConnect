<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //page pour ajoute un post
public function addpost(Request $request){
    return view("forum.postforum");
}
//page d'acceull de forum
    public function index()
{
    $posts = Post::with('comments')->get();
    $lastposts = Post::with('comments')->orderBy('created_at','desc')->paginate(5);
    return view('forum.forum', compact('posts','lastposts'));
}
//for storing forum posts 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
    
        $post = new Post;
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->user_id = auth()->id(); 
        $post->save();
    
        return redirect()->route('forum')->with('success', 'Post created successfully.');
    }
    //page post
    public function detailspost($post_id){
        $post = Post::findOrFail($post_id);
        return view('postdetail', compact('post'));
    }
}
