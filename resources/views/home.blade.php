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
            <h1 class="text-center">{{ $posts_count }} </h1>
        </div>
    </div>
</div>

<div class="col-lg-3" style="width: 350px;">
    <div class="panel panel-danger">
        <div class="panel-heading text-center">
           <a style="color: red;"  href="{{route('posts.trashed')}}">TRASHED POSTS</a>
        </div>
        <div class="panel-body">
            <h1 class="text-center">{{$trashed_count}}</h1>
        </div>
    </div>
</div>

<div class="col-lg-3" style="width: 350px;">
    <div class="panel panel-success">
        <div class="panel-heading text-center">
            <a style="color: green;" href="{{route('users')}}" >USERS</a>
        </div>
        <div class="panel-body">
            <h1 class="text-center">{{ $users_count }} </h1>
        </div>
    </div>
</div>


<div class="col-lg-3" style="width: 350px;">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
          <a style="color: gray" href="{{route('categories')}}">CATEGORIES</a>
        </div>
        <div class="panel-body">
            <h1 class="text-center">{{$categories_count}} </h1>
        </div>
    </div>
</div>

</div>
@include('admin.includes.footer')
