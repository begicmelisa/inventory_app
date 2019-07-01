@include('admin.includes.head')
@include('admin.includes.nav')




<section class="content-header">
    <h1>
        SALE
        <!-- <small>Control panel</small>-->
    </h1>

</section>

<div id="all">


    <div id="saleDiv" style="float: right; margin-top: 45px;   padding-left: 100px; width: 770px; height: 600px;">

        <table class="table table-striped " style="width: 350px;">
            <thead>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
             <!--   <th class="centerText">Created</th> -->
            </tr>
            </thead>
            <tbody>
            @if($sales->count()>0)
                @foreach( $sales as $key =>$values)
                    <tr>
                        <td >{{ $values->price }} x {{$values->quantity}}  </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>   {{$values->price*$values->quantity}}</td>
                    </tr>
                    <br>
                @endforeach
            @else
                <tr>
                    <!-- class="text-center" -->
                    <th colspan="5" >No published posts.</th>
                </tr>

            @endif


            </tbody>
        </table>
    </div>

    <div id="saleDiv" style="float: left; margin-top: 50px; padding-top: 40px;   display: inline-block;
 padding-left: 100px; width: 770px; height: 600px;">

        <div>
            <div class="col-md-4" id="searchBtnBarcode">
                <form action="{{route('sale.searchBarcode')}}" method="get">
                    <div class="form-group">
                        <input type="search" name="search" class="form-control" placeholder="Type Barcode" style="margin-top: 50px; width: 555px;">
                        <div id="btnSearchBarcode">
                               <span class="form-control-btn">
                                     <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                               </span>
                        </div>
                    </div>
                </form>
            </div>
            @if($sales->count()>0)
                @foreach( $sales as $key =>$values)
                    <div class="panel-body" >

                        <form action="{{route('sale.store')}}" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_token" id="csrf-token" style="width: 600px;" value="{{ Session::token() }}" />
                            <br><br>


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
                                    <input type="number" min="1" readonly  name="quantity" style="width: 600px;"  value="{{$values->quantity}}"  class="form-control">
                                    <br>
                                </div>


                                <div class="form-group" >
                                    <label for="quantity"  >Add Quantity:</label>
                                    <input type="number"  min="1" id="quantity" style="width: 600px;"  name="quantity" class="form-control">
                                    <br>
                                </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-success" type="submit">Add</button>
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