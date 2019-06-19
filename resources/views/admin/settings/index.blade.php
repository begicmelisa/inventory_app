<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INVENTORY</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
        #formDiv{
            width: 900px;
            height: 450px;
            margin: auto;
            margin-left: 150px;
            margin-top: 20px;

        }
        #titlePost{
            height: 50px;
            margin-left: 30px;
        }
        #validateDiv{
            width: 900px;
            margin: auto;
            margin-left: 150px;
        }

    </style>
</head>

@include('admin.includes.nav')
@include('admin.includes.errors')



<section class="content-header">
    <h1></h1>
</section>

<div class="panel panel-default" id="formDiv">
    <div  id="titlePost">
        <h3> Settings</h3>
    </div>

    <div class="panel-body" >
        <form action="{{route('settings.update')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$settings->name}}"  class="form-control">
            </div>

            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number"   value="{{$settings->contact_number}}"  class="form-control">
            </div>

            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="text" name="contact_email"   value="{{$settings->contact_email}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address"   value="{{$settings->address}}" class="form-control">
            </div>

        </form>
    </div>
</div>



@include('admin.includes.script')
