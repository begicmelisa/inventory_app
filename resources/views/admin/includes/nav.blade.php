<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
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
                              {{Auth::user()->name}} <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                              <li><a href="{{route('user.profile')}}"><i class="fa fa-btn fa-user"></i>Profile</a> </li>
                              <li><a href="{{route('logout')}}"><i class="fa fa-btn fa-sign-out"></i>Logout</a> </li>
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
                <div class="pull-left image">
                    <img src="/img/laravel-logo.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">NAVIGATION</li>
                <li>
                    <a href="{{route('home')}}">
                        <i class="fa fa-home"></i> <span>Home</span>
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-clone"></i>
                        <span>Post</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('posts')}} "><i class="fa fa-list-alt"></i> List</a></li>
                        <li><a href="{{route('post.create')}}"><i class="fa fa-plus"></i> Create</a></li>
                        <li><a href="{{route('posts.trashed')}}"><i class="fa fa-trash"></i> Trashed Posts</a></li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-clone"></i>
                        <span>Category</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('categories')}}"><i class="fa fa-list-alt"></i> List</a></li>
                        <li><a href="{{route('category.create')}}"><i class="fa fa-plus"></i> Add</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-clone"></i>
                        <span>Tag</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('tags')}}"><i class="fa fa-list-alt"></i> List</a></li>
                        <li><a href="{{route('tag.create')}}"><i class="fa fa-plus"></i> Add</a></li>


                    </ul>
                </li>
            @if(Auth::user()->admin)
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-clone"></i>
                            <span>User</span>
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

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-clone"></i>
                        <span>Settings</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('settings.index')}}"><i class="fa fa-list-alt"></i> Settings</a></li>

                        @if(Auth::user()->admin)
                        <li><a href="{{route('settings')}}"><i class="fa fa-refresh"></i> Update Settings</a></li>
                        @endif
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-clone"></i>
                        <span>Products</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="products"><i class="fa fa-list-alt"></i> List</a></li>
                        <li><a href="addProducts"><i class="fa fa-plus"></i> Add</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-clone"></i>
                        <span>Store</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="stores"><i class="fa fa-list-alt"></i> List</a></li>
                        <li><a href="addStore"><i class="fa fa-plus"></i> Add</a></li>


                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Employees</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="employees"><i class="fa fa-list-alt"></i> List</a></li>
                        <li><a href="/addEmployee"><i class="fa fa-plus"></i> Add</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>Locations</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="locations"><i class="fa fa-list-alt"></i> List</a></li>
                        <li><a href="/addLocation"><i class="fa fa-plus"></i> Add</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-table"></i> <span>Tables</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                        <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                    </ul>
                </li>
                <li>
                    <a href="pages/calendar.html">
                        <i class="fa fa-calendar"></i> <span>Calendar</span>
                        <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
                    </a>
                </li>


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
