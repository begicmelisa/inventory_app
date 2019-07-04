<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Validator;
use Session;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications=DB::table('notifications')->paginate(3);
        return view('home')->with('notifications',$notifications);
    }

    public function create()
    {
        return view('admin.notifications.create');
    }

    public function store(Request $request)
    {    $this->validate($request,[
        'body'=>'required',
        'title'=>'required',

    ]);

            $notification= Notification::create([
                'user_id'=>$request->user_id,
                'title'=>$request->title,
                'body'=>$request->body,
            ]);


            Session::flash('success','You successfully created notification.');
            return redirect()->route('home')->with('notification',$notification);



    }


}
