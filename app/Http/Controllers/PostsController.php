<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index() 
    {
        $posts = Post::latest()->get();

    	return view('posts.index', compact('posts'));
    }

    public function create() 
    {
    	return view('posts.create');
    }

    public function store()
    {
    	//$post = new Post;

    	//$post->title = request('title');

    	//$post->body = request('body');

    	//$post->save();
       
        $this->validate(request(), [

            'title' => 'required',
            'body' => 'required'
        ]);
    	
    	Post::create([

            'title' => request('title'), 
            'body' => request('body'), 
            'user_id' => auth()->id()
        ]);

    	return redirect('/');

    	//dd(request()->all());
    	//dd(request('title'));
    	//dd(request('body'));
    	//dd(request(['title', 'body']));
    	
    }

    public function show(Post $post)  //Route-Model Biding
    {
        //$post = Post::find($id);
        
       return view('posts.show', compact('post'));
    }
}
