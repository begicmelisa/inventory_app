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

    <div class="panel-body" >
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

            <div class="form-group">
                <label for="title">Author</label>
                <input type="text" name="title" class="form-control" value="{{Auth::user()->name}}" readonly>
                <br>
            </div>

            <div class="form-group">
                <label for="barcode">Barcode</label>
                <input type="text" name="barcode" class="form-control">
                <br>
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
                <br>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" min="1" name="quantity" class="form-control">
                <br>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" min="1" name="price" class="form-control">
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


