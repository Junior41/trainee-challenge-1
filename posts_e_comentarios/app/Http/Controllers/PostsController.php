<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $post = new Post();
        $post->content = $request->conteudo;
        $post->name = "Junior Brandão";
        $post->save();
        return view('home');
    }
}
