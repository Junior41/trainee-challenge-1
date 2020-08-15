<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Illuminate\Support\Facades\Auth;

class SendPosts extends Controller
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
        $post->name = Auth::user()->name;
        $post->save();
        return redirect('/home',301);
    }
}
