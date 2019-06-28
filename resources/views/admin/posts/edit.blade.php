@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')

        <section class="content-header">
            <h1>

            </h1>

        </section>



        <div class="panel panel-default" id="formDiv1">
            <div  id="titlePost">
                <h3> Update products </h3>
            </div>

            <div class="panel-body" >
                <form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $post->title }}"/>
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="barcode">Barcode</label>
                        <input type="text" name="barcode" value="{{ $post->barcode }}" class="form-control"/>
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" min="1" name="price" value="{{ $post->price }}" class="form-control"/>
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" min="1" name="quantity" value="{{ $post->quantity }}" class="form-control"/>
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="category">Select a Category</label>
                        <select name="category_id" id="category" class="form-control" >
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                    @if($post->category->id == $category->id)
                                        selected
                                    @endif
                                >{{$category->name}}</option>
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


                    <div class="form-group">
                        <label for="featured">Featured image</label>
                        <input type="file" name="featured" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" cols="5" rows="5" class="form-control">{{$post->content}}</textarea>
                        <br>
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Add Post</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>



@include('admin.includes.footer')

