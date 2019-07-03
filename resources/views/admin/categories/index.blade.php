@include('admin.includes.head')
@include('admin.includes.nav')



<div style="float: left; margin-left: 160px; width: 100%; height: 20px; ">
<section class="content-header"><h1>CATEGORIES</h1></section>
</div><br><br><br>


<!-- ADD -->
<div id="all">
    <div id="btnCategory">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"> Add New </button>
    </div>
    @include('admin.categories.editCategory')
    @include('admin.categories.addnew')

    <div>

                            <div class="col-md-4" id="searchBtn">
                                <form action="{{route('category.searchCat')}}" method="get">
                                    <div class="form-group">
                                        <input type="search" name="search" class="form-control" placeholder="Search Category" style="width: 350px;">
                                        <div id="btnSearch">
                                            <span class="form-control-btn">
                                                   <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>


                    <div class="Row" style="text-align: center;" id="tableCategories" >
                        <div class="panel-heading" style="text-align: left;">
                            <a style="margin-left: -15px; margin-bottom: -60px;  "   href="{{route('categories')}}">All Categories</a>
                        </div>
                    <table class="table  table-striped table-bordered">

                        <thead  >
                        <tr>
                            <th class="centerText">Title</th>
                            <th class="centerText">Created</th>
                            <th class="centerText">Updated</th>
                            <th class="centerText">Action</th>
                        </tr>
                        </thead>
                        <tbody  >
                  @if($categories->count()>0)

                      @foreach( $categories as $key =>$values)
                          <tr>
                              <td>{{$values->title}}</td>
                              <td>{{ \Carbon\Carbon::parse($values->created_at)->diffForHumans() }}</td>
                              <td>{{ \Carbon\Carbon::parse($values->updated_at)->diffForHumans() }}</td>

                              <td>
                                  <button class="btn btn-primary btn-sm editBtn" data-catid="{{$values->id}}" data-mytitle="{{$values->title}}" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                  <a href="{{route('category.delete',['id'=>$values->id])}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> </a>
                              </td>

                          </tr>
                      @endforeach

                  @else
                      <tr>
                          <!--  -->
                          <th colspan="5" class="text-center" >No categories yet.</th>
                      </tr>

                  @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



<div style="padding-top: 800px; padding-left: 600px;">
    {{$categories->links()}}
</div>


@include('admin.includes.footer')

