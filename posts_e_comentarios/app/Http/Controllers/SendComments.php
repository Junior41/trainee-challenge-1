<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class SendComments extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$id)
    {
        $comment = new Comment();
        $comment->name = Auth::user()->name;
        $comment->content = $request->comentario;
        $comment->post_id = $id;
        $comment->save();
        return redirect('/home',301);
    }
}
