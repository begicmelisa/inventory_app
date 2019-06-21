@include('admin.includes.head')
@include('admin.includes.nav')




<section class="content-header">
    <h1>
        USERS
    </h1>

</section>

<div id="all">

    <div class="col-md-6" id="add1">


       <!-- <div class="col-lg-10 col-lg-offset-2" id="addBtn">
            <a href="{{route('tag.create')}}" class="btn btn-success" style="height: 35px">New Tag</a>
        </div> -->


    </div>
    <div class="col-md-6" id="add1">

        <form method="POST" action="{{route('user.create')}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <fieldset>
                <div class="form-group" >
                    <div class="col-lg-10 col-lg-offset-2" id="addBtn">
                        <a href="{{route('user.create')}}" class="btn btn-success" style="height: 35px">New User</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <div>

        <div class="col-md-4" id="searchBtn">
            <form action="{{route('user.searchUser')}}" method="get">
                <div class="form-group">
                    <input type="search" name="search" class="form-control" placeholder="Search User" style="width: 350px;">
                    <div id="btnSearch">
                                            <span class="form-control-btn">
                                                   <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            </span>
                    </div>
                </div>
            </form>
        </div>

        <div class="Row" style="text-align: center;" id="tableCategories" >
            <div class="panel-heading" style="text-align: left;">
                <a href="{{route('users')}}">All Users</a>

            </div><br>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="centerText">ID</th>
                    <th class="centerText">Name</th>
                    <th class="centerText">Email</th>
                    <th class="centerText">Permissions</th>
                    <th class="centerText">Created</th>
                    <th class="centerText">Updated</th>
                    <th class="centerText">Action</th>
                </tr>
                </thead>
                <tbody>
                @if($users->count()>0)
                    @foreach( $users as $key =>$values)
                        <tr>
                            <td>{{$values->id}}</td>
                            <td>{{$values->name}}</td>
                            <td>{{$values->email}}</td>
                            <td>
                                @if(@$values->admin )
                                  @if(Auth::id() !== $values->id)
                                    <a href="{{route('user.not.admin',['id'=>$values->id])}}" class="btn btn-xs btn-danger" style="width: 120px">Remove permissions</a>
                                  @endif
                                @else
                                    <a href="{{route('user.admin',['id'=>$values->id])}}" class="btn btn-xs btn-success" style="width: 120px">Make admin</a>

                                @endif


                            </td>
                            <td>{{ \Carbon\Carbon::parse($values->created_at)->diffForHumans() }}</td>
                            <td>{{ \Carbon\Carbon::parse($values->updated_at)->diffForHumans() }}</td>
                            <td>
                                @if(Auth::id() !== $values->id)
                                <a href="{{route('user.delete',['id'=>$values->id])}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> </a>
                                @endif
                            </td>



                        </tr>
                    @endforeach

                @else
                    <tr>
                        <!-- class="text-center" -->
                        <th colspan="5" >No users.</th>
                    </tr>

                @endif

                </tbody>
            </table>
        </div>

    </div>
</div>
</div>



@include('admin.includes.footer')
