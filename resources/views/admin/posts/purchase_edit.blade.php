@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')


<section class="content-header">
    <h1>

    </h1>

</section>

<div class="panel panel-default" id="formDiv1">
    <div  id="titlePost">
        <h3> Create a new product</h3>
    </div>

    <div>
        <div class="col-md-6" id="add1"></div>

        <div>
            <div class="col-md-4" id="searchBtnbarcode">
                <form action="{{route('post.searchBarcode')}}" method="get">
                    <div class="form-group">
                        <input type="search" name="search" class="form-control" placeholder="Type Barcode" style="width: 350px;">
                        <div id="btnSearch">
                               <span class="form-control-btn">
                                     <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                               </span>
                        </div>
                    </div>
                </form>
            </div>



        </div>
        <div class="panel-body" >
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                <div class="form-group"><br><br><br><br><br><br>
                    <label for="title">Author</label>
                    <input type="text" name="title" class="form-control" value="{{Auth::user()->name}}" readonly>
                    <br>
                </div>
                <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                </form>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title"  value="{{ $post->title }} class="form-control">
                    <br>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" min="1" name="price"  value="{{ $post->price }} class="form-control">
                    <br>
                </div>


                <br><br><br>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" min="1" name="quantity"  value="{{ $post->quantity }} class="form-control">
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



@include('admin.includes.footer')


