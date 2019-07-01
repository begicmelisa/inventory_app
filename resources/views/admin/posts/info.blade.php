@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')


<section class="content-header">
    <h1>

    </h1>

</section>

<div class="panel panel-default" id="createPurchase">
    <div  id="titlePost">
        <h3> Product Details</h3>
    </div><br><br><br><br>

    <div>
        <div class="col-md-6" id="add1"></div>


                <div class="panel-body" >
                    <form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="_token" id="csrf-token" style="width: 600px;" value="{{ Session::token() }}" />
                        <div style="float: left; width: 700px; margin-top: -80px; ">
                            <div class="form-group">
                                <label for="name">Author</label>
                                <input type="text" name="name" class="form-control" style="width: 600px;" value="{{Auth::user()->name}}" readonly>
                            </div>


                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title"   class="form-control"  style="width: 600px;" value="{{ $post->title }}">
                                <br>
                            </div>

                            <div class="form-group">
                                <label for="category"> Category</label>
                                <input type="text"   style="width: 600px;" class="form-control" value="{{$post->category->name}}">
                                <br>
                            </div>

                            <div class="form-group">
                                <label for="tags">Tags</label><br>
                                @foreach($tags as $tag)

                                    @foreach($post->tags as $t)
                                        @if($tag->id==$t->id)
                                            {{$tag->tag}},
                                        @endif
                                    @endforeach

                                @endforeach
                            </div>
                            <br>


                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price"   style="width: 600px; "  id="price" cols="5" rows="5" class="form-control" value="{{$post->price}} " />
                                <br>
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content"  style="width: 600px;"  id="content" cols="5" rows="5" class="form-control">{{$post->content}}</textarea>
                                <br>
                            </div>
                        </div>
                        <div style="width: 500px; float: right;   margin-right: 40px; margin-top: -65px;   height: 355px; padding-top: 7px;  ">
                            <img src="{{$post->featured}}" alt="{{$post->title}}" width="490px" height="355px">

                        </div>


                    </form>
                </div>



    </div>



@include('admin.includes.footer')


