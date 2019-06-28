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
                <label for="tag">User</label>
                <input type="text" name="name"  value="{{$user->name}}" class="form-control">
                <br>
            </div>



            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control">
                <br>
            </div>

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
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control" >
                        @if($user->gender =="Male")
                            <option value="Male">M</option>
                            <option value="Female">F</option>

                            @else
                            <option value="Female">F</option>
                            <option value="Male">M</option>
                        @endif
                    </select>
                    <br>
                </div>

                <div class="form-group">
                <label for="bornDate">Born Date</label>
                <input type="date" name="bornDate" value="{{Carbon\Carbon::parse($user->bornDate)->format('Y-m-d')}}" class="form-control">
                <br>
            </div>

                @if(Auth::id() !== $user->id)
            <div class="form-group">
                <label for="hiringDate">Hiring Date</label>
                <input type="text" name="hiringDate" value="{{$user->hiringDate}}" class="form-control">
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
