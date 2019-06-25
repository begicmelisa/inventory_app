@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')

<section class="content-header">
    <h1>

    </h1>

</section>



<div class="panel panel-default" id="formDivInfoPosts">


    <div class="panel-body" >
        <form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


            <div class="form-group">
                <img src="{{$post->featured}}" alt="{{$post->title}}" width="180px" height="150px">
                <br>
            </div><br>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title"   class="form-control" value="{{ $post->title }}">
                <br>
            </div>

            <div class="form-group">
                <label for="category"> Category</label>
              <input type="text"   class="form-control" value="{{$post->category->name}}">
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
                <input type="text" name="price"   id="price" cols="5" rows="5" class="form-control" value="{{$post->price}} " />
                <br>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content"   id="content" cols="5" rows="5" class="form-control">{{$post->content}}</textarea>
                <br>
            </div>
<br>
            <div class="form-group">
                <div class="text-center">
                    <a href="{{route('displayposts')}}" class="btn btn-primary btn-lg "><span >Back</span> </a>
                </div>
            </div>

        </form>
    </div>

</div>




@include('admin.includes.footer')

