@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')


<section class="content-header">
    <h1>

    </h1>

</section>

<div class="panel panel-default" id="createPurchase">
    <div  id="titlePost">
        <h3> New Purchase 11</h3>
    </div><br><br><br><br>

    <div>
        <div class="col-md-6" id="add1"></div>

        <div>
            <div class="col-md-4" id="searchBtnBarcode">
                <form action="{{route('purchase.searchBarcode')}}" method="get">
                    <div class="form-group">
                        <input type="search" name="search" class="form-control" placeholder="Type Barcode" style="width: 555px;">
                        <div id="btnSearchBarcode">
                               <span class="form-control-btn">
                                     <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                               </span>
                        </div>
                    </div>
                </form>
            </div>



        </div>
        @if($purchases->count()>0)
            @foreach( $purchases as $key =>$values)
        <div class="panel-body" >

            <form action="{{route('purchase.store')}}" method="post" enctype="multipart/form-data">

                <input type="hidden" name="_token" id="csrf-token" style="width: 600px;" value="{{ Session::token() }}" />
                <div style="float: left; width: 700px;  ">
                    <div class="form-group">
                        <label for="name">Author</label>
                        <input type="text" name="name" class="form-control" style="width: 600px;" value="{{Auth::user()->name}}" readonly>
                    </div>


                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" readonly value="{{$values->title}}" style="width: 600px;" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="post_id"   value="{{$values->id}}" style="width: 600px;" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="barcode" hidden value="{{$values->barcode}}" style="width: 600px;" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="user_id" hidden value="{{Auth::user()->id}}" style="width: 600px;" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" min="1" readonly value="{{$values->price}}" style="width: 600px;" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" min="1" readonly  name="quantity" style="width: 600px;" value="{{$values->quantity}}"  class="form-control">
                        <br>
                    </div>
                </div>
                <div style="width: 500px; float: right;   margin-right: 40px; margin-top: -85px;   height: 355px; padding-top: 7px;  ">
                    <img src="{{$values->featured}}" alt="{{$values->title}}" width="490px" height="355px">

                </div>
                <div style=" width: 1245px; height: 450px; padding-top: 355px;">
                    <div class="form-group" >
                        <label for="quantity_new"  >Add Quantity:</label>
                        <input type="number"  min="1"   name="quantity_new" class="form-control">
                        <br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Quantity</button>
                    </div>
                </div>
            </form>
        </div>
            @endforeach

        @else
            <tr>
                <!-- class="text-center" -->
                <th colspan="5" >No published posts.</th>
            </tr>

        @endif
    </div>



@include('admin.includes.footer')


