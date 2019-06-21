@include('admin.includes.head')
@include('admin.includes.nav')



        <section class="content-header">
            <h1>
                CATEGORIES
                <!-- <small>Control panel</small>-->
            </h1>

        </section>




        <div id="all">

            <div class="col-md-6" id="add1">

              <!--  <form method="POST" action="{{route('category.create')}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <fieldset>
                        <div class="form-group" >
                            <div class="col-lg-10 col-lg-offset-2" id="addBtn">
                                <a href="{{route('category.create')}}" class="btn btn-success" style="height: 35px">New Category</a>
                            </div>
                        </div>
                    </fieldset>
                </form> -->
            </div>
            <div>

                <div class="col-md-4" id="searchBtn">
                    <form action="{{route('post.searchPostTrashed')}}" method="get">
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


                <div class="Row" style="text-align: center;" id="tableCategories" >
                    <div class="panel-heading" style="text-align: left;">
                        <a href="{{route('posts.trashed')}}">Trashed posts</a>
                    </div><br>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="centerText">ID</th>
                            <th class="centerText">Image</th>
                            <th class="centerText">Title</th>
                            <th class="centerText">Slug</th>
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
                                  <td>{{$values->id}}</td>
                                  <td><img src="{{$values->featured}}" alt="{{$values->title}}" width="80px" height="50px"> </td>
                                  <td>{{$values->title}}</td>
                                  <td>{{$values->slug}}</td>
                                  <td>CATEGORYYYYY</td>
                                  <td>Yes</td>
                                  <td>{{ \Carbon\Carbon::parse($values->created_at)->diffForHumans() }}</td>
                                  <td>{{ \Carbon\Carbon::parse($values->updated_at)->diffForHumans() }}</td>
                                  <td>
                                      <a href="{{route('post.restore',['id'=>$values->id])}}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-repeat"></span> </a>
                                      <a href="{{route('post.kill',['id'=>$values->id])}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> </a>
                                  </td>
                              </tr>
                          @endforeach

                      @else

                          <tr>
                              <!-- class="text-center" -->
                              <th colspan="5" >No trashed posts.</th>
                          </tr>


                      @endif

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>




@include('admin.includes.footer')
