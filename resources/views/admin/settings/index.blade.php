@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')




<section class="content-header">
    <h1></h1>
</section>

<div class="panel panel-default" id="formDiv">
    <div  id="titlePost">
        <h3> Settings</h3>
    </div>

    <div class="panel-body" >
        <form action="{{route('settings.update')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$settings->name}}"  class="form-control">
            </div>

            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number"   value="{{$settings->contact_number}}"  class="form-control">
            </div>

            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="text" name="contact_email"   value="{{$settings->contact_email}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address"   value="{{$settings->address}}" class="form-control">
            </div>

        </form>
    </div>
</div>




@include('admin.includes.footer')
