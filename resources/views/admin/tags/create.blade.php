@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')



        <section class="content-header">
            <h1>

            </h1>

        </section>



        <div class="panel panel-default" id="formDiv">
            <div  id="titlePost">
                <h3> Create a new tag</h3>
            </div>

            <div class="panel-body" >
                <form action="{{route('tag.store')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


                    <div class="form-group">
                        <label for="tag">Tag</label>
                        <input type="text" name="tag" class="form-control">
                        <br>
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Add Tag</button>
                        </div>
                    </div>

                   <!-- <div class="form-group" >
                             <div class="col-lg-10 col-lg-offset-2" id="addBtn" style="float: left;">
                                 <a href="{{route('post.create')}}" class="btn btn-success" style="height: 35px">New Post</a>

                             </div>
                        </div> -->
                </form>
            </div>
        </div>



@include('admin.includes.footer')

