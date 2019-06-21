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

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
        #addCategories{
            margin-left: 650px;
            margin-top: 70px;
            height: 100px;
            width: 500px;
        }
        #addBtn{
            margin-left: 950px;
            margin-top: 65px;
        }

        #tableCategories{
            width: 1200px;
            margin-left: 180px;
            position: fixed;
            margin-top: 160px;
        }
        .centerText{
            text-align: center;
        }
        #searchBtn{
            margin-left:  -750px;
            margin-top: 60px;
        }
        #divList{
            width: 920px;
        }
        #formDiv{
            width: 900px;
            height: 550px;
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

        #btnSearch{
            margin-left: 355px;
            margin-top: -34px;
        }
        #formDiv1{
            width: 900px;
            height: 750px;
            margin: auto;
            margin-left: 150px;
            margin-top: 20px;
        }


        #loginDiv{
            width: 700px;
            height: 350px;
            margin: auto;
            margin-top: 200px;
            font-size: 15px;
            background: whitesmoke ;
            padding-left: 100px;
            padding-top: 20px;
        }

        #registerDiv{
            width: 700px;
            height: 450px;
            margin: auto;
            margin-top: 215px;


            font-size: 15px;
            background: whitesmoke ;
            padding-left: 100px;
            padding-top: 20px;
        }

        #add1{
            margin-left: 200px;}
    </style>
</head>