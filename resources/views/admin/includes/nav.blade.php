


<body class="hold-transition skin-blue sidebar-mini">


<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{route('home')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Inventory</b>App</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu" >
                <ul class="nav navbar-nav" style="margin-right: 30px;">
                    <!-- Authentication Links -->
                  @if(Auth::guest())
                        <li><a href="{{url('/login')}}">Login</a> </li>
                        <li><a href="{{url('/register')}}">Register</a> </li>
                  @else

                      <li class="dropdown">

                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              <img src="{{url('storage/profile_photos/default.jpg')}}" style="border-radius: 50px; width:25px; height: 25px; margin-top: -5px;" >

                              {{Auth::user()->name}} <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                              <li><a href="{{route('user.profile')}}"><i class="fa fa-btn fa-user"></i>Profile</a> </li>
                              <li><a href="{{url('/logout')}}"><i class="fa fa-btn fa-sign-out"></i>Logout</a> </li>
                          </ul>
                      </li>

                  @endif
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image" style="margin-left: 20px; ">

                    <img src="{{url('storage/profile_photos/default.jpg')}}" style="border-radius: 50px; width:25px; height: 25px;" >

                </div>
                <div class="pull-left info" >

                    <p style="font-size: 16x;"> {{Auth::user()->name}} </p>

                </div>
            </div><br>
            <!-- search form -->

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <div id="nav">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">NAVIGATION</li><br>
                <li>
                    <a href="{{route('home')}}">
                        <i class="fa fa-home"></i> <span>Home</span>
                    </a>
                </li><br>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Sales</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('sales')}} "><i class="fa fa-list-alt"></i> List</a></li>
                        <li><a href="{{route('sale.create')}}"><i class="fa fa-plus"></i> Add</a></li>

                    </ul>
                </li><br>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list"></i>
                        <span>Stock</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('purchases')}} "><i class="fa fa-list-alt"></i> List</a></li>
                        <li><a href="{{route('purchase.create')}}"><i class="fa fa-plus"></i> Add</a></li>
                    </ul>
                </li><br>

               <!-- <li>
                    <a href="{{route('purchase')}} "><i class="fa fa-shopping-cart"></i> Purchase</a>
                </li><br> -->

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <span>Products</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('posts')}} "><i class="fa fa-list-alt"></i> List</a></li>
                        <li><a href="{{route('post.create')}}"><i class="fa fa-plus"></i> Create</a></li>
                        <li><a href="{{route('posts.trashed')}}"><i class="fa fa-history"></i> Trashed Posts</a></li>

                    </ul>
                </li><br>
                <li>
                    <a href="{{route('displayposts')}}"><i class="fa fa-picture-o"></i> <span>Posts</span></a>

                </li><br>

                <li>
                    <a href="{{route('categories')}}"><i class="fa fa-clone"></i> <span>Category</span></a>
                </li><br>

                <li>
                    <a href="{{route('tags')}}"><i class="fa fa-tag" aria-hidden="true"></i><span>Tag</span></a>
                </li>
                @if(Auth::User()) <?php // add this line to check if user logged in or not ?>
            @if(Auth::user()->admin)
                <br>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-address-card"></i>
                            <span>Employees</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('users')}}"><i class="fa fa-list-alt"></i> List</a></li>
                            <li><a href="{{route('user.create')}}"><i class="fa fa-plus"></i> Add</a></li>
                        </ul>
                    </li>

            @endif
            @endif
                <br>

              <!--  <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        <span>Notifications</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="locations"><i class="fa fa-list-alt"></i> List</a></li>
                        <li><a href="/addLocation"><i class="fa fa-plus"></i> Add</a></li>
                    </ul>
                </li><br>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                        <span>Chart</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="locations"><i class="fa fa-list-alt"></i> List</a></li>
                        <li><a href="/addLocation"><i class="fa fa-plus"></i> Add</a></li>
                    </ul>
                </li><br> -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i>
                        <span>Settings</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('settings.index')}}"><i class="fa fa-list-alt"></i> Settings</a></li>
                        @if(Auth::User()) <?php // add this line to check if user logged in or not ?>
                        @if(Auth::user()->admin)
                            <li><a href="{{route('settings')}}"><i class="fa fa-refresh"></i> Update Settings</a></li>
                        @endif
                        @endif
                    </ul>
                </li><br>
            </ul>
            </div>

        </section>

        <div style="margin-top:40px; margin-left: 10px;">
            <a href="https://www.facebook.com/" target="_blank"><button class="btn btn-primary btn-lg"><i class="fa fa-facebook-f"></i> </button></a>
            <a href="https://www.instagram.com/?hl=hr" target="_blank"><button class="btn btn-primary btn-lg"><i class="fa fa-instagram"></i> </button></a>
            <a href="https://www.global.ba/" target="_blank"><button class="btn btn-primary btn-lg"><i class="fa fa-globe"></i> </button></a>
            <a href="https://www.amazon.com/" target="_blank"><button class="btn btn-primary btn-lg"><i class="fa fa-amazon"></i> </button></a>
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
