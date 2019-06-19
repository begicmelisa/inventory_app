<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Session;

class SettingsController extends Controller
{

    public function index()
    {

        return view('admin.settings.settings')->with('settings',Setting::first());
    }

    public function indexV()
    {
        return view('admin.settings.index')->with('settings',Setting::first());
    }

    public function update()
    {
       $this->validate(request(),[
           'name'=>'required',
           'contact_number'=>'required',
           'contact_email'=>'required',
           'address'=>'required',
       ]);
        $settings =Setting::first();

        $settings->name=\request()->name;
        $settings->contact_number=\request()->contact_number;
        $settings->contact_email=\request()->contact_email;
        $settings->address=\request()->address;

        $settings->save();

        Session::flash('success','Settings updated successfully.');

        return redirect()->route('settings');


    }

}
