@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')


        <section class="content-header">
            <h1>

            </h1>

        </section>


        <div id="validateDiv">
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="list-group-item text-danger">
                        {{$error}}
                    </div>
                @endforeach

            @endif
        </div>

        <div class="panel panel-default" id="formDiv">
            <div  id="titlePost">
                <h3> Update category</h3>
            </div>



            <div class="panel-body" >
                <form action="{{route('category.update',['id'=>$category->id])}}" method="post" >
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name"  value="{{$category->name}}" class="form-control">
                        <br>
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Update Post</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>



@include('admin.includes.footer')

