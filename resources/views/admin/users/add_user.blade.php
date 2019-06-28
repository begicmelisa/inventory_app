@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')


<section class="content-header">
    <h1>

    </h1>

</section>



<div class="panel panel-default" id="addUserDetails">
    <div  id="titlePost">
        <h3> Create a new user</h3>
    </div><br>

    <div class="panel-body" >
        <form action="{{route('user.update_add_user',['id'=>$user->id])}}" method="post" >

            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" required name="address" value="{{$user->address}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" required name="phone" value="{{$user->phone}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="bornDate">Born Date</label>
                <input type="date" required name="bornDate" value="{{$user->bornDate}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control" >
                    <option value="Male">M</option>
                    <option value="Female">F</option>
                </select>
            </div>


        @if(Auth::id() !== $user->id)
                <div class="form-group">
                    <label for="hiringDate">Hiring Date</label>
                    <input type="date" required name="hiringDate" value="{{Carbon\Carbon::today()->toDateString()}}" class="form-control">
                </div>
            @endif
<br><br>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update User</button>
                </div>
            </div>
         <!--   <div class="form-group">
                <div class="text-center">
                    <input type="submit" value="Back" href="{{route('users')}}" class="btn btn-success" type="submit">
                </div>
            </div> -->

        </form>
    </div>
</div>



@include('admin.includes.footer')
