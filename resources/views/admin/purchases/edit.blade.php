@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')


<section class="content-header">
    <h1>

    </h1>

</section>

<div class="panel panel-default" id="editPurchase">
    <div  id="titlePost">
        <h3> EDIT PURCHASE</h3>
    </div><br><br><br><br>

    <div>
        <div class="col-md-6" id="add1"></div>

        <div>


        </div>

                <div class="panel-body" >

                    <form action="{{route('purchase.update',['id'=>$purchase->id])}}" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="_token" id="csrf-token" style="width: 600px;" value="{{ Session::token() }}" />
                        <div style="float: left; width: 700px;  ">
                            <div class="form-group">
                                <label for="postUser">Author</label>
                                <input type="text" id="postUser" name="postUser" class="form-control" style="width: 600px;" value="{{Auth::user()->name}}" readonly>
                            </div>


                            <div class="form-group">
                                <label for="postTitle">Title</label>
                                <input type="text" name="postTitle" readonly value="{{$purchase->postTitle}}" style="width: 600px;" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="post_id"   value="{{$purchase->id}}" style="width: 600px;" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="barcode" hidden value="{{$purchase->barcode}}" style="width: 600px;" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="user_id" hidden value="{{Auth::user()->id}}" style="width: 600px;" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="price">Price (per unit)</label>
                                <input type="number" min="1" readonly value="{{$purchase->price}}" style="width: 600px;" name="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="quantity_new">Quantity</label>
                                <input type="number" min="1"    name="quantity_new" style="width: 600px;" value="{{$purchase->quantity_new}}"  class="form-control">
                                <br>
                            </div>

                            <div class="form-group">
                                <label for="purchase_id">Purchase ID</label>
                                <input type="number" min="1"    name="purchase_id" style="width: 600px;" value="{{$purchase->quantity_new}}"  class="form-control">
                                <br>
                            </div>
                        </div>
                        <div style=" float: right;   margin-right: 40px; margin-top: -79px;   height: 355px; width: 500px; padding-top: 7px;  ">
                        </div>
                        <div style=" width: 1240px; height: 450px; padding-top: 355px;">

                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" id="updatePurchasebtn" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>



    </div>



@include('admin.includes.footer')


