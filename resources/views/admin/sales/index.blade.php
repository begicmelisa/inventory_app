@include('admin.includes.head')
@include('admin.includes.nav')




<div style="float: left; margin-left: 65px; width: 100%; height: 20px; ">
    <section class="content-header"><h1>SALE</h1></section>
</div><br><br><br>
<div id="all">

    <div class="col-md-6"  >
        <div class="col-lg-10 col-lg-offset-2" id="addBtn">
            <a href="{{route('sale.create')}}" class="btn btn-success" style="height: 35px">Add New</a>
        </div>
    </div>


    <div>

        <div class="col-md-4" id="searchBtn1">
            <form action="{{route('sale.search')}}" method="get">
                <div class="form-group">
                    <input type="search" name="search" class="form-control" placeholder="Search Product" style="width: 350px;">
                    <div id="btnSearch">
                                            <span class="form-control-btn">
                                                   <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            </span>
                    </div>
                </div>
            </form>
        </div>


        <div class="Row" style="text-align: center;" id="tableList" >
            <div class="panel-heading" style="text-align: left;">
                <a style="margin-left: -15px; margin-bottom: -60px; "   href="{{route('purchases')}}">Stock</a>
            </div>
            <table class="table  table-striped table-bordered">
                <thead>
                <tr>
                    <th class="centerText">Author</th>
                    <th class="centerText">Barcode</th>
                    <th class="centerText">Product</th>
                    <th class="centerText">Price (per unit)</th>
                    <th class="centerText">Profit</th>
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
                            <td>{{ $values->postUser }}</td>
                            <td>{{ $values->barcode }}</td>
                            <td>{{ $values->postTitle }}</td>
                            <td>{{ $values->price }}$</td>
                            <td>{{ $values->profit}}$</td>
                            <td>{{$values->quantity_new}}</td>
                            <td>{{ \Carbon\Carbon::parse($values->created_at)->diffForHumans() }}</td>
                            <td>{{ \Carbon\Carbon::parse($values->updated_at)->diffForHumans() }}</td>
                            <td>
                                <a href="{{route('sale.edit',['id'=>$values->id])}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> </a>
                                <a href="{{route('sale.delete',['id'=>$values->id])}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> </a>
                            </td>

                        </tr>
                    @endforeach

                @else
                    <tr>
                        <!-- class="text-center" -->
                        <th colspan="10" >No products sold.</th>
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

