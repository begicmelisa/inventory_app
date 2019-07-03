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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>

        .multiselect{
            width: 200px;
        }
        .selectBox{
            position: relative;
        }
        .selectBox select{
            width: 100%;

        }
        .overSelect{
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }

        #checkboxes{
            display: none;
            border: 1px #dadada solid;
            width: 600px;
            z-index:2;
            padding-left: 20px;
            position: absolute;
background: white;

        }
        #checkboxes label{
            display: block;
        }



        .avatar{
            border-radius: 100%;
            max-width: 100px;
        }
        #addCategories{
            margin-left: 650px;
            margin-top: 70px;
            height: 100px;
            width: 500px;
        }
        #addBtn{
            margin-left: 1400px;
            margin-top: 65px;
        }

        #tableUsers, #tablePosts{
            width: 1400px;
            margin-left: 110px;
            position: fixed;
            margin-top: 140px;
        }

        #btnSearchBarcode{
            margin-left: 560px;
            margin-top: -34px;
        }
        #searchBtnBarcode{
            margin-right:100px;
            margin-top: -60px;
        }

        #notificaitons{
            float: right;
            margin-top: 80px;
            width: 1375px;
            height: 400px;
            padding-right: 20px;
        }

        #editSale{
            border-top: 1px solid lightskyblue;

            width: 900px;
            height: 700px;
            margin: auto;
            padding-left: 50px;
            padding-right: 40px;
            margin-top: 80px;
        }

        #editPurchase{
            border-top: 1px solid lightskyblue;

            width: 900px;
            height: 700px;
            margin: auto;
            padding-left: 100px;
            padding-right: 40px;
            margin-top: 80px;
        }
#createPurchase{

    border-top: 1px solid lightskyblue;

    width: 1400px;
    height: 700px;
    margin: auto;
    padding-left: 40px;
    padding-right: 40px;
    margin-top: 80px;
}
        #createPost{
            width: 1400px;
            height: 700px;
            margin: auto;

            padding-left: 40px;
            padding-right: 40px;
            margin-top: 80px;
            border-top: 1px solid lightskyblue;


        }

        #editPurchasebtn{
            width: 90px;
            height: 40px;
            margin-top: -20px;
            margin-left: 1010px;
        }

        #updateSalebtn {
            width: 90px;
            height: 40px;
            margin-top: 28px;
            margin-left: 420px;
        }

        #updatePurchasebtn{
            width: 90px;
            height: 40px;
            margin-top: -300px;
            margin-left: 370px;
        }

        #createPurchasebtn{
            width: 90px;
            height: 40px;
            margin-top: 10px;
            margin-left: 1100px;
        }

        #createbtnPost{
            margin-top: 30px;
            margin-left: 500px;
            width: 90px;
            height: 40px;
        }

        #addPost{
            margin-top: 260px;
            margin-left: 500px;
        }

        #tableList{
            width: 1425px;
            margin-left: 80px;
            position: fixed;
            margin-top: 140px;
        }


        #tableCategories{
            width: 1200px;
            margin-left: 180px;
            position: fixed;
            margin-top: 140px;
        }
        .centerText{
            text-align: center;
        }

        #searchBtnuser{
            margin-left:  -740px;
            margin-top: 60px;
        }

        #searchBtn1{
            margin-left:  -750px;
            margin-top: 60px;
        }
        #searchBtnTrashed{
            margin-left:  -950px;
            margin-top: 60px;
        }

        #searchBtn{
            margin-left:  -850px;
            margin-top: 60px;
        }
        #divList{
            width: 920px;
        }
        #formDivSettings
        {
            width: 900px;
            height: 550px;
            margin: auto;

            margin-left: 350px;
            padding-left: 40px;
            padding-right: 40px;
            margin-top: 150px;
            border-top: 1px solid lightskyblue;
        }

        #formDivAddUser{
            width: 900px;
            height: 400px;
            margin-left: 350px;
            padding-left: 40px;
            padding-right: 40px;
            margin-top: 150px;
            border-top: 1px solid lightskyblue;
        }

        #editUserDetails{
            margin: auto;
            width: 900px;
            height: 720px;
            margin-left: 350px;
            padding-left: 40px;
            padding-right: 40px;
            margin-top: 70px;
            padding-top: -20px;
            border-top: 1px solid lightskyblue;
        }
        #addUserDetails{
            margin: auto;
            width: 900px;
            margin-left: 350px;
            padding-left: 40px;
            padding-right: 40px;
            margin-top: 150px;
            border-top: 1px solid lightskyblue;
        }

        #formNotification{
            border-top: 1px solid lightskyblue;

            width: 900px;
            height: 550px;
            margin: auto;
            margin-left: 350px;
            margin-top: 140px;

        }
        #formDiv{
            width: 900px;
            height: 750px;
            margin: auto;
            margin-left: 150px;
            margin-top: 20px;

        }

        #titleSale{
            height: 50px;
            margin-left: 60px;
        }
        #titlePost{
            height: 50px;
            margin-left: 17px;
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
            width: 1400px;
            height: 800px;
            margin: auto;
            margin-left: 150px;
            margin-top: 150px;
        }

        #formDivInfoPosts{
            width: 900px;
            height: 850px;
            margin: auto;
            margin-right: 400px;
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
#btnCategory {
    margin-right: 220px;
    width: 100px;
    height: 50px;
    float: right;
    margin-top: 62px;
}
        #add1{
            margin-left: 200px;}
    </style>
</head>