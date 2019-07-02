@include('admin.includes.head')
@include('admin.includes.nav')

<div>
        @if($posts->count()>0)

        @foreach( $posts as $key =>$values)

                <div style=" float: left;
-moz-box-shadow:    3px 3px 5px 6px #ccc;
  -webkit-box-shadow: 3px 3px 5px 6px #ccc;
  box-shadow:         3px 3px 5px 6px #ccc;
  width: 500px;
  border-radius: 30px;

  height: 300px;
  margin: 1em;
margin-left: 200px;
padding-top: 20px;
margin-top: 50px;">
                   <div style="float: left;   width: 250px; height: 50px; padding-top: 10px; padding-left: 20px;"><span style="float: left; font-size: 20px; padding-left: 20px;" >{{$values->title}}</span></div>

                    <div style="float: right;  width: 250px; height: 50px; padding-top: 5px;"><span style="float: right; font-size: 30px; padding-right: 20px;" > 36 $</span></div>
                    <div >
       <div style="float: left;"><img style="object-fit: cover; margin-top: 15px; margin-left: 30px; border-radius: 5px" src="{{$values->featured}}" alt="{{$values->title}}" width="300px" height="200px"></div>
                        <div style="float: right; padding-right: 20px; margin-top: 50px;"><span>Category: {{$values->category->title}}</span></div>

                    </div>

                    <a href="{{route('post.info',['id'=>$values->id])}}" style="float: right; margin-right:20px; margin-top:120px;">View details</a>

                </div>
            @endforeach
            @endif

                        </div>

<div style="padding-top: 800px; padding-left: 600px;">
  {{$posts->links()}}
</div>
@include('admin.includes.footer')

