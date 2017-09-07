<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostsController extends Controller
{
    public function index()
    {
        /*Aqui podemos paginas cuando tenemos muchos elementos
       
        #traemos los post en forma ordenado descendente
        #$posts = Post::orderBy('id','desc')->get();
       */ #$posts = Post::all(); aqui traemos todos los post
        $posts = Post::orderBy('id', 'desc')->paginate(15);

        return view('posts.index')->with(compact('posts'));
    }

    public function show(Post $post)
    {
        #$post = Post::find($postId);
    
        return view('posts.show')->with(['post'=>$post]);
    }

    public function create(Post $post)
    {
        return view('posts.create')->with(['post'=>$post]); #se agrego el with ... para darle mas similitud con el edit para simplificar vistas
    }

    public function store(CreatePostRequest $request)
    {
        #una forma de guardar los post
        // $post = new Post;
        // $post->title = $request->get('title');
        // $post->description = $request->get('description');
        // $post->url = $request->get('url');
        // $post->save();
        $post = Post::create($request->only('title', 'description', 'url'));
        $post->save();
        session()->flash('message', 'Post Created');
        return redirect()->route('posts_path');
    }

    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post'=>$post]);
    }

    public function update(Post $post, UpdatePostRequest $request)
    {
        ##Una forma de actualizar los datos
        /*$post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->url = $request->get('url');
        $post->save();
        */       
        $post->update(
            $request->only('title', 'description', 'url')
        );

        session()->flash('message', 'Post Updated');
        return redirect()->route('post_path', ['post'=>$post->id]);
    }


    public function delete(Post $post)
    {
        $post->delete();

        session()->flash('message', 'Post Deleted');

        return redirect()->route('posts_path');
    }
}