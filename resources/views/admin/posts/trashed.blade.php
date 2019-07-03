@include('admin.includes.head')
@include('admin.includes.nav')




<div style="float: left; margin-left: 65px; width: 100%; height: 20px; ">
    <section class="content-header"><h1>TRASHED PRODUCTS</h1></section>
</div><br><br><br>
<div id="all">

    <div class="col-md-6" id="add1">
        <div class="col-lg-10 col-lg-offset-2" id="addBtn">
        </div>
    </div>

    <div>

        <div class="col-md-4" id="searchBtnTrashed">
            <form action="{{route('post.searchTrashedPost')}}" method="get">
                <div class="form-group">
                    <input type="search" name="search" class="form-control" placeholder="Search Trashed Posts" style="width: 350px;">
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
                <a style="margin-left: -15px; margin-bottom: -60px; "   href="{{route('posts')}}">Trashed products</a>
            </div>
            <table class="table  table-striped table-bordered">

                        <thead>
                        <tr>
                            <th class="centerText">Image</th>
                            <th class="centerText">Title</th>
                            <th class="centerText">Price</th>
                            <th class="centerText">Category</th>
                            <th class="centerText">Trashed</th>
                            <th class="centerText">Created</th>
                            <th class="centerText">Updated</th>
                            <th class="centerText">Action/Restore</th>
                        </tr>
                        </thead>
                        <tbody>
                      @if($posts->count()>0)
                          @foreach( $posts as $key =>$values)
                              <tr>
                                  <td><img src="{{$values->featured}}" alt="{{$values->title}}" width="80px" height="50px"> </td>
                                  <td style="padding-top: 20px;">{{$values->title}}</td>
                                  <td style="padding-top: 20px;">{{$values->price}}</td>
                                  <td style="padding-top: 20px;">{{$values->title}}</td>
                                  <td style="padding-top: 20px;">Yes</td>
                                  <td style="padding-top: 20px;">{{ \Carbon\Carbon::parse($values->created_at)->diffForHumans() }}</td>
                                  <td style="padding-top: 20px;">{{ \Carbon\Carbon::parse($values->updated_at)->diffForHumans() }}</td>
                                  <td style="padding-top: 20px;">
                                      <a href="{{route('post.restore',['id'=>$values->id])}}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-repeat"></span> </a>
                                      <a href="{{route('post.kill',['id'=>$values->id])}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> </a>
                                  </td>
                              </tr>
                          @endforeach

                      @else

                          <tr>
                              <!-- class="text-center" -->
                              <th colspan="10" >No trashed posts.</th>
                          </tr>


                      @endif

                        </tbody>
                    </table>
                </div>

            </div>
        </div>



<div style="padding-top: 760px; padding-left: 600px;">
    {{$posts->links()}}
</div>


@include('admin.includes.footer')
