<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        $comments = [];
        for($i = 0; $i < count($posts);$i++){
            array_push($comments,0);
            $comments[$i] = Comment::where('post_id',$posts[$i]->id)->get();
        }
        return view('home',compact('posts','comments'));
    }
}
