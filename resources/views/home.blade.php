@include('admin.includes.head')
@include('admin.includes.nav')



        <section class="content-header" style="margin-left: 100px;">
            <h1>HOME</h1>
        </section>
<br><br>
<div style="margin-left: 100px; margin-top: 20px;">
<div class="col-lg-3" style="width: 350px;">
    <div class="panel panel-info">
        <div class="panel-heading text-center">
            <a style="color: dodgerblue;" href="{{route('users')}}" >SALES</a>

        </div>
        <div class="panel-body">

            <h1 class="text-center">{{$sales_count}}</h1>


        </div>
    </div>
</div>

<div class="col-lg-3" style="width: 350px; ">
    <div class="panel panel-default">
        <div class="panel-heading text-center" style="background: 	#ffe0cc">
           <a style="color: 	#ff6600;"  href="{{route('posts.trashed')}}">STOCK</a>
        </div>
        <div class="panel-body">

            <h1 class="text-center">{{$purchases_count}}</h1>

        </div>
    </div>
</div>

<div class="col-lg-3" style="width: 350px;">
    <div class="panel panel-success">
        <div class="panel-heading text-center">
            <a style="color: green;" href="{{route('posts')}} ">PUBLISHED PRODUCT</a>

        </div>
        <div class="panel-body">
            <h1 class="text-center">{{$posts_count}}</h1>

        </div>
    </div>
</div>




    <div class="col-lg-3" style="width: 350px;">
        <div class="panel panel-danger">
            <div class="panel-heading text-center" style="background: #ffcccc;">
                <a style="color: red" href="{{route('categories')}}">TRASHED PRODUCT</a>
            </div>
            <div class="panel-body">

                <h1 class="text-center">{{$trashed_count}}</h1>


            </div>
        </div>


        <div id="notificaitons">
            <div class="Row" style="text-align: center;" id="" >
                <div class="panel-heading" style="text-align: left;">
                <!--          <a href="{{route('home')}} ">All Notifications</a>   -->
                </div><br>

                @if($notifications->count()>0)
                    @foreach( $notifications as $key =>$values)
                        <div style="text-align: left;  background: 	white; padding-bottom: 45px; border: 1px solid #C0C0C0;
                          border-radius: 10px; padding-left: 30px; word-wrap: break-word;
                          min-height: 100px; width: 1375px; font-size: 20px; ">
                           <div style="  display: inline-block;
 width: 65px; height: 65px; margin-left: -50px; margin-top: -10px;">
                               <img src="{{Storage::url($user->avatar)}}" style="object-fit: cover; width: 65px; height: 65px;
                               float: left; margin-right: 400px; border-radius: 50%; margin-right: 25px;" >
                           </div>
                            <div>
                            <div  style="float: left; width: 1315px;  border-bottom: 1px solid #C0C0C0 ; float: right;   margin-top: -55px;">
<span>{{Auth::user()->name}}</span>
                           </div>
                            </div>

                            <div style=" margin-left: -20px;">
                                <span>{{$values->body}}</span><br>

                                <div style="float: right; margin-right: 35px;   margin-top: 15px;  color: grey;">
                             <span>{{Carbon\Carbon::parse($values->created_at)->format('d/m/Y')}} </span><span style="margin-left: 20px;">{{Carbon\Carbon::parse($values->created_at)->format('H:i')}}</span>
                                </div>
                            </div>
                        </div><br><br>
                    @endforeach

                @else
                    <a>aaaaaaaaaaaaaaaaaaaaaaaa</a>
                @endif
            </div>


        </div>


    </div>

    <div style="padding-top: 690px; padding-left: 600px;">
        {{$notifications->links()}}
    </div>



    <div class="panel-body">
    </div>
@include('admin.includes.footer')
