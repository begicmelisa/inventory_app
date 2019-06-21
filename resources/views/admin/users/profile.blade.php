@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')



<section class="content-header"><h1></h1></section>

<div class="panel panel-default" id="formDiv">
    <div  id="titlePost">
        <br>
                <?php // this way to get photo and display it  ?>
        <img src="{{Storage::url($user->avatar)}}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;" >
        <br>
        <h2>{{$user->name}}'s Profile</h2>
                                <?php  // add this action by route function and use the name of route?>
        <form enctype="multipart/form-data" action="{{route('user.update_avatar')}}" method="post">
            <label>Update Profile Image</label>
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" class="pull-right btn btn-sm btn-primary" value="Upload" style="margin-right: 380px; margin-top: -25px;">

        </form>
    </div>

    <div class="panel-body" >
        <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

<br><br><br><br><br><br><br><br>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="tag">Email</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control">
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Upload Profile</button>
                </div>
            </div>

        </form>
    </div>
</div>




@include('admin.includes.footer')

