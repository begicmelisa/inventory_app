@include('admin.includes.head')
@include('admin.includes.nav')





<div style="float: left; margin-left: 65px; width: 100%; height: 20px; ">
    <section class="content-header"><h1>PRODUCTS</h1></section>
</div><br><br><br>
<div id="all">

    <div class="col-md-6"  >
        <div class="col-lg-10 col-lg-offset-2" id="addBtn">
            <a href="{{route('post.create')}}" class="btn btn-success" style="height: 35px">Add New</a>
        </div>
    </div>

    <div>

        <div class="col-md-4" id="searchBtn1">
            <form action="{{route('post.searchPost')}}" method="get">
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
                <a style="margin-left: -15px; margin-bottom: -60px; "   href="{{route('posts')}}">All products</a>
            </div>
            <table class="table  table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="centerText">Image</th>
                            <th class="centerText">Title</th>
                            <th class="centerText">Barcode</th>
                            <th class="centerText">Price</th>
                            <th class="centerText">Quantity</th>
                            <th class="centerText">Category</th>
                            <th class="centerText">Created</th>
                            <th class="centerText">Updated</th>
                            <th class="centerText">Author</th>
                            <th class="centerText">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                     @if($posts->count()>0)
                         @foreach( $posts as $key =>$values)
                             <tr>
                                 <td><img style=" object-fit: cover;" src="{{$values->featured}}" alt="{{$values->title}}" width="80px" height="50px"> </td>
                                 <td style="padding-top: 20px;">{{$values->title}}</td>
                                 <td style="padding-top: 20px;">{{$values->barcode}}</td>
                                 <td style="padding-top: 20px;">{{$values->price}}</td>
                                 <td style="padding-top: 20px;">{{$values->quantity}}</td>
                                 <td style="padding-top: 20px;">{{$values->category->title}}</td>
                                 <td style="padding-top: 20px;">{{ \Carbon\Carbon::parse($values->created_at)->diffForHumans() }}</td>
                                 <td style="padding-top: 20px;">{{ \Carbon\Carbon::parse($values->updated_at)->diffForHumans() }}</td>
                                 <td style="padding-top: 20px;"> {{Auth::user()->name}}</td>

                                 <td style="padding-top: 20px;">
                                     <a href="{{route('post.edit',['id'=>$values->id])}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> </a>
                                     <a href="{{route('post.delete',['id'=>$values->id])}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> </a>
                                 </td>

                             </tr>
                         @endforeach

                     @else
                         <tr>
                             <!-- class="text-center" -->
                             <th colspan="10" >No published posts.</th>
                         </tr>

                     @endif

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

<div style="padding-top: 800px; padding-left: 600px;">
    {{$posts->links()}}
</div>
@include('admin.includes.footer')

