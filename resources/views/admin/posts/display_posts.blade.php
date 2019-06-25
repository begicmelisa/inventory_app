@include('admin.includes.head')
@include('admin.includes.nav')


    @if($posts->count()>0)
        @foreach( $posts as $key =>$values)
<div
style="
border-style: ridge;
border-color: ghostwhite;
float: left;
display: table;
width: 200px;
height: 300px;
margin-left: 60px;
margin-top: 60px;
"
>
    <div style="float: left;"><img style="margin: auto; margin-left: 7.5px; margin-top: 10px; " src="{{$values->featured}}" alt="{{$values->title}}" width="180px" height="150px"></div>
    <div  style=""><a href="{{route('post.info',['id'=>$values->id])}}" style="display: table; padding-top: 10px;  margin: 0 auto; ">{{$values->title}}</a></div>




</div>
        @endforeach
    @endif

@include('admin.includes.footer')

