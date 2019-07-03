<div class="col-md-6" id="add1">


    <!-- create category -->
    <div class="modal fade" id="editTag" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('tag.update','test')}}" method="post" >
                    {{method_field('patch')}}
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="tag">Title</label>
                            <input type="text" name="tag" id="tag" placeholder="Title Tag" class="form-control">
                            <br>
                        </div>

                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" name="id" id="id" placeholder="id" class="form-control">
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- END MODEL ADD -->