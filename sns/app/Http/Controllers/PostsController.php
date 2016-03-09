<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
      $posts = Post::latest('created_at')->get();
      return view('posts.index')->with('posts', $posts);
    }


    public function store(Request $request)
    {
       $this->validate($request, [
         'content' => 'required',
       ]);

       $post = new Post();
       $post->content = $request->content;
       $post->save();
       return redirect('posts');
    }


    public function edit($id)
    {
      $post = Post::findOrFail($id);
      return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
       $this->validate($request, [
         'content' => 'required',
       ]);

       $post = Post::findOrFail($id);
       $post->content = $request->content;
       $post->save();
       return redirect('posts');
    }



    public function destroy($id)
    {
      $post = Post::findOrFail($id);
      $post->delete();
      return redirect('posts');
    }

    public function show($id)
    {
      $post = Post::findOrFail($id);
      return view('posts.show')->with('post', $post);
    }

}
