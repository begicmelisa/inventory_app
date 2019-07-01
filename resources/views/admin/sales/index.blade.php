@include('admin.includes.head')
@include('admin.includes.nav')




<section class="content-header">
    <h1>
        SALE
        <!-- <small>Control panel</small>-->
    </h1>

</section>

<div id="all">

    <div class="col-md-6" id="add1">
        <div class="col-lg-10 col-lg-offset-2" id="addBtn">
            <a href="{{route('purchase.create')}}" class="btn btn-success" style="height: 35px">Add New</a>
        </div>
    </div>

    <div>

        <div class="col-md-4" id="searchBtn">
            <form action="{{route('purchase.search')}}" method="get">
                <div class="form-group">
                    <input type="search" name="search" class="form-control" placeholder="Search Purchases" style="width: 350px;">
                    <div id="btnSearch">
                                            <span class="form-control-btn">
                                                   <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            </span>
                    </div>
                </div>
            </form>
        </div>


        <div class="Row" style="text-align: center;" id="tablePosts" >
            <div class="panel-heading" style="text-align: left;">
                <a href="{{route('sales')}} ">All Sales</a>
            </div><br>
            <table class="table ">
                <thead>
                <tr>
                    <th class="centerText">ID</th>
                    <th class="centerText">Author</th>
                    <th class="centerText">Barcode</th>
                    <th class="centerText">Product</th>
                    <th class="centerText">Price</th>
                    <th class="centerText">Quantity</th>
                    <th class="centerText">Created</th>
                    <th class="centerText">Updated</th>
                    <th class="centerText">Action</th>
                </tr>
                </thead>
                <tbody>
                @if($sales->count()>0)
                    @foreach( $sales as $key =>$values)
                        <tr>
                            <td>{{$values->id}}</td>
                            <td> {{Auth::user()->name}}</td>
                            <td>{{ $values->barcode }}</td>
                            <td>procuct</td>
                            <td>{{ $values->price }}</td>
                            <td>{{$values->quantity}}</td>
                            <td>{{ \Carbon\Carbon::parse($values->created_at)->diffForHumans() }}</td>
                            <td>{{ \Carbon\Carbon::parse($values->updated_at)->diffForHumans() }}</td>
                            <td>
                                <a href="{{route('purchase.edit',['id'=>$values->id])}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> </a>
                                <a href="{{route('sale.delete',['id'=>$values->id])}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> </a>
                            </td>

                        </tr>
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

    </div>
</div>
<div style="padding-top: 800px; padding-left: 600px;">
    {{$sales->links()}}
</div>

@include('admin.includes.footer')

