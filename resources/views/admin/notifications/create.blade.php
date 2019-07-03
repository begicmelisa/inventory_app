@include('admin.includes.head')
@include('admin.includes.nav')
@include('admin.includes.errors')



<section class="content-header">
    <h1></h1>
</section>


<div class="panel panel-default" id="formNotification">
    <div  id="titlePost">
        <h3> Create a new Notification</h3>
    </div>

    <div class="panel-body" >
        <form action="{{route('notification.store')}}" method="post" >
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title"  placeholder="Title Notification" class="form-control">
                <br>
            </div>



            <div class="form-group">
                <input type="hidden" name="user_id" hidden value="{{Auth::user()->id}}" style="width: 600px;" class="form-control">
            </div>

            <div class="form-group"><br>
                <label for="body">Body</label>
                <textarea  id="body" name="body" cols="6" rows="7" class="form-control"></textarea>
                <br>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" style="width: 90px;
            height: 40px;" type="submit">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>




@include('admin.includes.footer')