@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')


<section class="content-header">
    <h1>

    </h1>

</section>

<div class="panel panel-default" id="createPost">
    <div  id="titlePost">
        <h3> Update Purchase</h3>
    </div>
    <br>

    <form action="{{route('purchase.update',['id'=>$purchase->id])}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <div style="float: left; width: 600px;  ">
            <div class="form-group">
                <label for="postUser">Author</label>
                <input type="text" name="postUser" class="form-control" value="{{Auth::user()->name}}" readonly>
            </div>

            <div class="form-group">
                <input type="hidden" name="user_id" hidden value="{{Auth::user()->id}}" style="width: 600px;" class="form-control">
            </div>

            <div class="form-group">
                <label for="postTitle">Product Title</label>
                <input type="text" value="{{$purchase->post->title}}" readonly name="postTitle" class="form-control">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" value="{{$purchase->post->price}}" readonly name="price" class="form-control">
            </div>

            <div class="form-group">
                <label for="barcode">Barcode</label>
                <input type="text" value="{{$purchase->post->barcode}}" readonly name="barcode" class="form-control">
            </div>

            <div class="form-group">
                <input type="hidden" name="post_id"   value="{{$purchase->post->id}}" style="width: 600px;" class="form-control">
            </div>

            <div class="form-group">
                <input type="hidden" name="user_id" hidden value="{{Auth::user()->id}}" style="width: 600px;" class="form-control">
            </div><br><br>

            <div class="form-group">
                <label for="quantity_new">Quantity New</label>
                <input type="number" value="{{$purchase->quantity_new}}" min="1" name="quantity_new" class="form-control">
            </div>

            <div class="form-group"  >
                <div class="text-center">
                    <button  style=" margin-top: 110px; margin-left: 500px;"  class="btn btn-success" type="submit">Update</button>
                </div>
            </div>

        </div>
    </form>
</div>
</div>




@include('admin.includes.footer')


