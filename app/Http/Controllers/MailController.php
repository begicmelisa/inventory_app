<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;


Use Mail;

class MailController extends Controller
{
    //

    public function basic_email(){
        $data=["name"=>"Niko Nikic"];
        Mail::send(['text'=>'mail'],$data,function($message){
            $message->to('nikonikic9987765@gmail.com','Niko Nikic')->subject('Send Mail from Laravel with Basics Email');
            $message->from('melisabegic230896@gmail.com','Melisa');

        });
        echo 'Basics Email was sent';

    }

    public  function html_email()
    {
        $data=["name"=>"Niko Nikic"];
        Mail::send(['text'=>'mail'],$data,function($message){
            $message->to('nikonikic9987765@gmail.com','Niko Nikic')->subject('Send Mail from Laravel with HTML Email');
            $message->from('melisabegic230896@gmail.com','Melisa');

        });
        echo 'HTML Email was sent';
    }

}
