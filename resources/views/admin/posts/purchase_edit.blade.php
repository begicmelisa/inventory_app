@include('admin.includes.head')
@include('admin.includes.nav')




<section class="content-header">
    <h1>
        PRODUCTS
        <!-- <small>Control panel</small>-->
    </h1>

</section>

<div id="all">

    <div class="col-md-6" id="add1">
        <div class="col-lg-10 col-lg-offset-2" id="addBtn">
            <a href="{{route('post.create')}}" class="btn btn-success" style="height: 35px">New Posts</a>
        </div>
    </div>

    <div>

        <div class="col-md-4" id="searchBtn">
            <form action="{{route('post.searchPost')}}" method="get">
                <div class="form-group">
                    <input type="search" name="search" class="form-control" placeholder="Search Posts" style="width: 350px;">
                    <div id="btnSearch">
                                            <span class="form-control-btn">
                                                   <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            </span>
                    </div>
                </div>
            </form>
        </div>


        <div class="panel-body" >
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                <div class="form-group"><br><br><br><br><br><br>
                    <label for="title">Author</label>
                    <input type="text" name="title" class="form-control" value="{{Auth::user()->name}}" readonly>
                    <br>
                </div>
                <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                </form>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                    <br>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" min="1" name="price" class="form-control">
                    <br>
                </div>


                <br><br><br>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" min="1" name="quantity" class="form-control">
                    <br>
                </div>


                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Add Post</button>
                    </div>
                </div>

            </form>
        </div>


        <div style="padding-top: 800px; padding-left: 600px;">
    {{$posts->links()}}
</div>
@include('admin.includes.footer')

