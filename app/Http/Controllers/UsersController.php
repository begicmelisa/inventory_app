<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;
use Faker\Provider\Image;
use DB;

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


    public function searchUser(Request $request){
        $search=$request->get('search');
        $users=DB::table('users')->where('name', 'like', '%'.$search.'%')
                                 ->orWhere('email', 'like', '%'.$search.'%')->paginate(5);

        return view('admin.users.index',['users'=>$users]);
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

        Session::flash('success','User added successfully.');
        return redirect()->route('users');
    }


    public function profile()
    {
        return view('admin.users.profile', array('user'=>Auth::user()));
    }


    public function update_avatar(Request $request)
    {
        if($request ->hasFile('avatar')){

        $file_original_name = $request->avatar->getClientOriginalName();
        $file_extention = \File::extension($file_original_name);
        $request->avatar->storeAs('public/profile_photos',$file_original_name); // store photo file

            $user=Auth::user();
            $user->avatar='public/profile_photos/'.$file_original_name;
            $user->save();
        }

        return redirect()->back();
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

        Session::flash('success','Successfully changed user permissions.');

        return redirect()->route('users');
    }
}
