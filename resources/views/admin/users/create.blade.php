@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')



<section class="content-header">
    <h1>

    </h1>

</section>



<div class="panel panel-default" id="formDiv">
    <div  id="titlePost">
        <h3> Create a new user</h3>
    </div>

    <div class="panel-body" >
        <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


            <div class="form-group">
                <label for="tag">User</label>
                <input type="text" name="name" class="form-control">
                <br>
            </div>



            <div class="form-group">
                <label for="tag">Email</label>
                <input type="email" name="email" class="form-control">
                <br>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control">
                <br>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control">
                <br>
            </div>

            <div class="form-group">
                <label for="bornDate">Born Date</label>
                <input type="date" name="bornDate" class="form-control">
                <br>
            </div>

            <div class="form-group">
                <label for="hiringDate">Hiring Date</label>
                <input type="date" name="hiringDate" class="form-control">
                <br>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Add User</button>
                </div>
            </div>

        </form>
    </div>
</div>



@include('admin.includes.footer')
