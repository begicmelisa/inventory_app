<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Purchase;
use App\Sale;
use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

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
        $user=Auth::user();


        $notifications=DB::table('notifications')->orderby('created_at','desc')->paginate(2);
        return view('home')->with('notifications',$notifications)->with('user',$user)
            ->with('trashed_count',Post::onlyTrashed()->get()->count())
            ->with('posts_count',Post::all()->count())
            ->with('sales_count',Sale::all()->count())
            ->with('purchases_count',Purchase::all()->count());
    }
}
