@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')


<section class="content-header">
    <h1>

    </h1>

</section>

<div class="panel panel-default" id="editSale">
    <div  id="titleSale">
        <h3> SALE</h3>
    </div><br><br><br><br>

    <div>
        <div class="col-md-6" id="add1"></div>


        <div class="panel-body" >

            <form action="{{route('sale.update',['id'=>$sale->id])}}" method="post" enctype="multipart/form-data">

                <input type="hidden" name="_token" id="csrf-token" style="width: 600px;" value="{{ Session::token() }}" />
                <div style="float: left; width: 700px; padding-left: 50px; ">
                    <div class="form-group">
                        <label for="postUser">Author</label>
                        <input type="text" id="postUser" name="postUser" class="form-control" style="width: 600px;" value="{{Auth::user()->name}}" readonly>
                    </div>


                    <div class="form-group">
                        <label for="postTitle">Title</label>
                        <input type="text" name="postTitle" readonly value="{{$sale->postTitle}}" style="width: 600px;" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="post_id"   value="{{$sale->id}}" style="width: 600px;" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="barcode" hidden value="{{$sale->barcode}}" style="width: 600px;" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="user_id" hidden value="{{Auth::user()->id}}" style="width: 600px;" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" min="1" readonly value="{{$sale->price}}" style="width: 600px;" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="quantity_new">Quantity</label>
                        <input type="number" min="1"    name="quantity_new" style="width: 600px;" value="{{$sale->quantity_new}}"  class="form-control">
                        <br>
                    </div>
                </div>


                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" id="updateSalebtn" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>



    </div>



@include('admin.includes.footer')


