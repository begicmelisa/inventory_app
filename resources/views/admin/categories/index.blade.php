@include('admin.includes.head')
@include('admin.includes.nav')




<section class="content-header">
            <h1>
                CATEGORIES
                <!-- <small>Control panel</small>-->
            </h1>

        </section>

<!-- ADD -->
<div id="all">

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
                            <a href="{{route('categories')}}">All Categories</a>
                        </div><br>
                    <table class="table  ">
                        <thead>
                        <tr>
                            <th class="centerText">ID</th>
                            <th class="centerText">Name</th>
                            <th class="centerText">Created</th>
                            <th class="centerText">Updated</th>
                            <th class="centerText">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                  @if($categories->count()>0)

                      @foreach( $categories as $key =>$values)
                          <tr>
                              <td>{{$values->id}}</td>
                              <td>{{$values->name}}</td>
                              <td>{{ \Carbon\Carbon::parse($values->created_at)->diffForHumans() }}</td>
                              <td>{{ \Carbon\Carbon::parse($values->updated_at)->diffForHumans() }}</td>

                              <td>
                                  <a class="btn btn-primary btn-sm editBtn"><span class="glyphicon glyphicon-pencil"></span></a>
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

