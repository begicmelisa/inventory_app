@include('admin.includes.head')

@include('admin.includes.nav')

       <section class="content-header">
           <h1>
               TAGS
           </h1>

       </section>

       <div id="all">

           <div class="col-md-6" id="add1">
                           <div class="col-lg-10 col-lg-offset-2" id="addBtn">
                               <a href="{{route('tag.create')}}" class="btn btn-success" style="height: 35px">New Tag</a>
                           </div>
                   </fieldset>
               </form>
           </div>

           <div>
               <div>

                   <div class="col-md-4" id="searchBtn">
                       <form action="{{route('tag.searchTag')}}" method="get">
                           <div class="form-group">
                               <input type="search" name="search" class="form-control" placeholder="Search Tag" style="width: 350px;">
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
                       <a href="{{route('tags')}}">All Tags</a>

                   </div><br>
                   <table class="table table-bordered">
                       <thead>
                       <tr>
                           <th class="centerText">ID</th>
                           <th class="centerText">Tag</th>
                           <th class="centerText">Created</th>
                           <th class="centerText">Updated</th>
                           <th class="centerText">Action</th>
                       </tr>
                       </thead>
                       <tbody>
                       @if($tags->count()>0)
                           @foreach( $tags as $key =>$values)
                               <tr>
                                   <td>{{$values->id}}</td>
                                   <td>{{$values->tag}}</td>
                                   <td>{{ \Carbon\Carbon::parse($values->created_at)->diffForHumans() }}</td>
                                   <td>{{ \Carbon\Carbon::parse($values->updated_at)->diffForHumans() }}</td>

                                   <td>
                                       <a href="{{route('tag.edit',['id'=>$values->id])}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> </a>
                                       <a href="{{route('tag.delete',['id'=>$values->id])}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> </a>
                                   </td>

                               </tr>
                           @endforeach

                       @else
                           <tr>
                               <!-- class="text-center" -->
                               <th colspan="5" >No tags yet.</th>
                           </tr>

                       @endif

                       </tbody>
                   </table>
               </div>

           </div>
       </div>
   </div>

@include('admin.includes.footer')

>