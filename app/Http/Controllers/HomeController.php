<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use App\Tag;
use Illuminate\Http\Request;
use Session;
use DB;

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
        $posts =Post::onlyTrashed()->get()->count();

        return view('home')
                           ->with('posts_count', Post::all()->count())
                           ->with('trashed_count',$posts)
                           ->with('users_count',User::all()->count())
                           ->with('categories_count',Category::all()->count());
    }
}
