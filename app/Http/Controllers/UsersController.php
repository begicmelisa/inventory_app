<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Tag;
use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;
use Faker\Provider\Image;
use DB;

class UsersController extends Controller
{

   /* public function __construct()
    {
        $this->middleware('admin');
    }  */

    public function index()
    {
        $users=DB::table('users')->paginate(10);
        return view('admin.users.index')->with('users',$users);
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function searchUser(Request $request){
        $search=$request->get('search');
        $users=DB::table('users')->where('name', 'like', '%'.$search.'%')
                                 ->orWhere('address', 'like', '%'.$search.'%')
                                 ->orWhere('phone', 'like', '%'.$search.'%')
                                 ->orWhere('email', 'like', '%'.$search.'%')->paginate(10);

        return view('admin.users.index',['users'=>$users]);
    }


    public function edit($id)
    {
        $user =User::find($id);
        return view('admin.users.edit')->with('user',$user);
    }

    public function add_user($id)
    {
        $user =User::find($id);
        return view('admin.users.add_user')->with('user',$user);
    }
    public function update_add_user (Request $request, $id)
    {
        $this->validate($request,[
            'address'=>'required',
            'phone'=>'required',
            'bornDate'=>'required',
        ]);

        $user=User::find($id);

        $user->address=$request->address;
        $user->phone=$request->phone;
        $user->hiringDate=$request->hiringDate;
        $user->bornDate=$request->bornDate;
        $user->hiringDate=$request->hiringDate;
        $user->save();

        Session::flash('success','User added successfully.');
        return redirect()->route('users');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required'
        ]);

        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->phone=$request->phone;
        $user->hiringDate=$request->hiringDate;
        $user->bornDate=$request->bornDate;
        $user->hiringDate=$request->hiringDate;
        $user->save();

        Session::flash('success','User updated successfully.');
        return redirect()->route('users');
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
            'password'=>bcrypt('password'),
       // $this->attributes['password']
        ]);

      //  Session::flash('success','User added successfully.');
        return view('admin.users.add_user')->with('user',$user);
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

        Session::flash('success','Successfully changed user permissions.');
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
