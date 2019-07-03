@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')



<section class="content-header">
    <h1></h1>
</section>


<div class="panel panel-default" id="formDiv">
    <div  id="titlePost">
        <h3> Create a new category</h3>
    </div>

    <div class="panel-body" >
        <form action="{{route('category.store')}}" method="post" >
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="title"  placeholder="Title Category" class="form-control">
                <br>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>




@include('admin.includes.footer')