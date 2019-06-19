<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;
use Faker\Provider\Image;
class UsersController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('admin');
    }*/

    public function index()
    {
        return view('admin.users.index')->with('users',User::all());
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
        ]);

        $user =User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt('password')
        ]);

        Session::flash('success','User added succesfully.');

        return redirect()->route('users');
    }

    public function profile()
    {
        return view('admin.users.profile', array('user'=>Auth::user()));
    }

    public function update_avatar(Request $request)
    {
        if($request ->hasFile('avatar')){
            $avatar=$request->file('avatar');
            $filename=time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars' . $filename));

            $user=Auth::user();
            $user->avatar=$filename;
            $user->save();
        }

        return view('admin.users.profile', array('user'=>Auth::user()));

    }

    public function destroy($id)
    {
        $user=User::find($id);

        $name=$user->name;

        $user->delete();

        Session::flash('success','User deleted.');

        return redirect()->back();

    }

    public function admin($id)
    {
        $user = User::find($id);

        $user->admin=1;
        $user->save();

        Session::flash('success','Succesfully changed user permissions.');

        return redirect()->route('users');

    }

    public function not_admin($id)
    {
        $user = User::find($id);

        $user->admin=0;
        $user->save();

        Session::flash('success','Succesfully changed user permissions.');

        return redirect()->route('users');

    }
}
