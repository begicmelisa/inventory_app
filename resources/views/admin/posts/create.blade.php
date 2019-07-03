@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')


        <section class="content-header">
            <h1>

            </h1>

        </section>

        <div class="panel panel-default" id="createPost">
            <div  id="titlePost">
                <h3> Create a new product</h3>
            </div>
            <br>
            <div class="panel-body" >
                <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <div style="float: left; width: 600px;  ">
                    <div class="form-group">
                        <label for="title">Author</label>
                        <input type="text" name="title" class="form-control" value="{{Auth::user()->name}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="barcode">Barcode</label>
                        <input type="text" name="barcode" class="form-control">
                    </div>

                        <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" min="1"  name="price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" min="1" name="quantity" class="form-control">
                    </div>



    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="text" id="content" cols="6" rows="7" class="form-control"></textarea>
        <br>
    </div>
                </div>

<div style="float: right; width: 600px;    ">


                    <div class="form-group">
                        <label for="category">Select a Category</label>
                        <select name="category_id" id="category" class="form-control" >
                            <option value="">-- Select Category --</option>

                        @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach

                        </select>
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="tags">Select tags</label>
                   @foreach($tags as $tag)
                       <div class="checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{$tag->id}}">{{ $tag->tag  }}</label>
                       </div>
                   @endforeach
                    </div>
<br>
                    <div class="form-group">
                        <label for="featured">Featured image</label>
                        <input type="file" name="featured"  >
                    </div>

                    <div class="form-group"  >
                        <div class="text-center">
                            <button id="createbtnPost" class="btn btn-success" type="submit">Add</button>
                        </div>
                    </div>

                </form>
            </div>

        </form>
            </div>



@include('admin.includes.footer')


