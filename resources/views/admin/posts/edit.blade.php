@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')


<section class="content-header">
    <h1>

    </h1>

</section>

<div class="panel panel-default" id="createPost">
    <div  id="titlePost">
        <h3> Update product</h3>
    </div>
    <br>
    <div class="panel-body" >
        <form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <div style="float: left; width: 600px;  ">
                <div class="form-group">
                    <label for="title">Author</label>
                    <input type="text" name="title" class="form-control" value="{{Auth::user()->name}}" readonly>
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" value="{{$post->title}}" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="barcode">Barcode</label>
                    <input type="text" value="{{$post->barcode}}" name="barcode" class="form-control">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" value="{{$post->price}}" min="1" name="price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" value="{{$post->quantity}}" min="1" name="quantity" class="form-control">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" value="{{$post->content}}" id="content" cols="6" rows="7" class="form-control"></textarea>
                    <br>
                </div>
            </div>

            <div style="float: right; width: 600px;    ">
<div >
                <div style=" width: 600px; float: right;  margin-top: 15px;   height: 160px; padding-top: 7px;  ">
                    <img src="{{$post->featured}}" style="object-fit: cover;" alt="{{$post->title}}" width="270px" height="150px">
                    <div class="form-group" style="float: right; margin-right:100px; margin-top: 115px;">
                        <input type="file" name="featured" style="width: 220px;">
                    </div>
                </div>
</div><br><br>
                <div class="form-group" >
                    <label for="category" style="margin-top: 50px;">Select a Category</label>
                    <select name="category_id" id="category" class="form-control" >
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                    @if($post->category->id == $category->id)
                                    selected
                                    @endif
                            >{{$category->title}}</option>
                        @endforeach

                    </select>
                    <br>
                </div>

                <div class="form-group">
                    <label for="tags">Select tags</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{$tag->id}}"

                                          @foreach($post->tags as $t)
                                          @if($tag->id==$t->id)
                                          checked
                                        @endif
                                        @endforeach

                                >{{ $tag->tag  }}</label>
                        </div>
                    @endforeach
                </div>

                <br>

                <div class="form-group"  >
                    <div class="text-center">
                        <button  style=" margin-top: 110px; margin-left: 500px;"  class="btn btn-success" type="submit">Update Post</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>




@include('admin.includes.footer')


