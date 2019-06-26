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
        <form action="{{route('user.update',['id'=>$user->id])}}" method="post" >

            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" value="{{$user->address}}" class="form-control">
                <br>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" value="{{$user->phone}}" class="form-control">
                <br>
            </div>

            <div class="form-group">
                <label for="bornDate">Born Date</label>
                <input type="date" name="bornDate" value="{{$user->bornDate}}" class="form-control">
                <br>
            </div>

            @if(Auth::id() !== $user->id)
                <div class="form-group">
                    <label for="hiringDate">Hiring Date</label>
                    <input type="date" name="hiringDate" value="{{$user->hiringDate}}" class="form-control">
                    <br>
                </div>
            @endif

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update User</button>
                </div>
            </div>

        </form>
    </div>
</div>



@include('admin.includes.footer')
