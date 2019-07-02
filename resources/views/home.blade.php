@include('admin.includes.head')
@include('admin.includes.nav')



        <section class="content-header">
            <h1>Home</h1>
        </section>
<br><br>
<div style="margin-left: 100px; margin-top: 20px;">
<div class="col-lg-3" style="width: 350px;">
    <div class="panel panel-info">
        <div class="panel-heading text-center">
           <a style="color: dodgerblue;" href="{{route('posts')}} ">PUBLISHED POSTS</a>
        </div>
        <div class="panel-body">
            @if($posts_count=0)
                {{"0"}}
                @else
                <h1 class="text-center">{{$posts_count}}</h1>
            @endif
        </div>
    </div>
</div>

<div class="col-lg-3" style="width: 350px;">
    <div class="panel panel-danger">
        <div class="panel-heading text-center">
           <a style="color: red;"  href="{{route('posts.trashed')}}">TRASHED POSTS</a>
        </div>
        <div class="panel-body">
            @if($trashed_count=0)
                {{"0"}}
            @else
                <h1 class="text-center">{{$trashed_count}}</h1>
            @endif
        </div>
    </div>
</div>

<div class="col-lg-3" style="width: 350px;">
    <div class="panel panel-success">
        <div class="panel-heading text-center">
            <a style="color: green;" href="{{route('users')}}" >USERS</a>
        </div>
        <div class="panel-body">
            @if($users_count=0)
                {{"0"}}
            @else
                <h1 class="text-center">{{$users_count}}</h1>
            @endif
        </div>
    </div>
</div>


<div class="col-lg-3" style="width: 350px;">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
          <a style="color: gray" href="{{route('categories')}}">CATEGORIES</a>
        </div>
        <div class="panel-body">
            @if($categories_count=0)
                {{"0"}}
            @else
                <h1 class="text-center">{{$categories_count}}</h1>
            @endif
        </div>
    </div>

    <img src="{{Storage::url(Auth::user()->avatar)}}" style="object-fit: cover; width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;" >


    <div id="notificaitons">
        <div class="Row" style="text-align: center;" id="" >
            <div class="panel-heading" style="text-align: left;">
      <!--          <a href="{{route('home')}} ">All Notifications</a>   -->
            </div><br>

            @if($notifications->count()>0)
                @foreach( $notifications as $key =>$values)
                  <div style="text-align: left;           border-radius: 10px;   border-top: 2px solid ghostwhite;
  padding-left: 30px;  word-wrap: break-word;  height: 100%; font-size: 20px; ">

                    <div class="card-header" style="font-size: 30px; font-weight:bold;">
                             <span>{{$values->title}}</span><br>
                         </div>
                         <div>
                             <span>{{$values->content}}</span>

                             <div style="float: right; margin-right: 150px; color: grey;">
                                 <br><span>{{Carbon\Carbon::parse($values->created_at)->format('d/m/Y')}} </span><span style="margin-left: 20px;">{{Carbon\Carbon::parse($values->created_at)->format('H:i')}}</span>
                             </div>
                         </div>
                     </div><br><br>
                @endforeach

            @else
                <a>notiii</a>
            @endif
    </div>


</div>


</div>
    <div style="padding-top: 750px; padding-left: 600px;">
        {{$notifications->links()}}
    </div>

@include('admin.includes.footer')
