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
            margin-left:  -650px;
            margin-top: 60px;
        }
        #divList{
            width: 920px;
        }

    </style>
</head>

@include('admin.includes.nav')

        <section class="content-header">
            <h1>
                POSTS
                <!-- <small>Control panel</small>-->
            </h1>

        </section>




        <div id="all">

            <div class="col-md-6" id="add1">

                <form method="POST" action="{{route('post.create')}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <fieldset>


                        <div class="form-group" >
                            <div class="col-lg-10 col-lg-offset-2" id="addBtn">
                                <a href="{{route('post.create')}}" class="btn btn-success" style="height: 35px">New Post</a>

                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
            <div>
                <div class="col-md-4" id="searchBtn">
                    <form action="{{URL::to('/categorysearch')}}" method="post" class="form-inline my-2 my-lg-0" role="search">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


                        <div class="input-group">
                            <input type="text" class="form-control" name="q" placeholder="Search">
                            <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                        </div>
                    </form>
                </div>


                <div class="Row" style="text-align: center;" id="tableCategories" >
                    <div class="panel-heading" style="text-align: left;">
                        Published posts
                    </div><br>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="centerText">ID</th>
                            <th class="centerText">Image</th>
                            <th class="centerText">Title</th>
                            <th class="centerText">Slug</th>
                            <th class="centerText">Content</th>
                            <th class="centerText">Category</th>
                            <th class="centerText">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                     @if($posts->count()>0)
                         @foreach( $posts as $key =>$values)
                             <tr>
                                 <td>{{$values->id}}</td>
                                 <td><img src="{{$values->featured}}" alt="{{$values->title}}" width="80px" height="50px"> </td>
                                 <td>{{$values->title}}</td>
                                 <td>{{ \Carbon\Carbon::parse($values->created_at)->diffForHumans() }}</td>
                                 <td>{{ \Carbon\Carbon::parse($values->updated_at)->diffForHumans() }}</td>

                                 <td>
                                     <a href="{{route('post.edit',['id'=>$values->id])}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> </a>
                                     <a href="{{route('post.delete',['id'=>$values->id])}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> </a>
                                 </td>

                             </tr>
                         @endforeach

                     @else
                         <tr>
                             <!-- class="text-center" -->
                             <th colspan="5" >No published posts.</th>
                         </tr>

                     @endif

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@include('admin.includes.script')
