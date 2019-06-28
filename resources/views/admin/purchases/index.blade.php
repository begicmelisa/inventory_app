@include('admin.includes.head')
@include('admin.includes.nav')




<section class="content-header">
    <h1>
        PRODUCTS
        <!-- <small>Control panel</small>-->
    </h1>

</section>

<div id="all">


        <div class="Row" style="text-align: center;" id="tableCategories" >
            <div class="panel-heading" style="text-align: left;">
                <a href="{{route('purchases')}} ">Published products</a>
            </div><br>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="centerText">ID</th>
                    <th class="centerText">Post Name</th>
                    <th class="centerText">User</th>
                    <th class="centerText">Created</th>
                    <th class="centerText">Quantity New</th>
                </tr>
                </thead>
                <tbody>
                @if($purchases->count()>0)
                    @foreach( $purchases as $key =>$values)
                        <tr>

                            <td>{{$values->id}}</td>
                            @foreach($purchases->post as $posts)
                            <td>{{$posts->title}}</td>
                            @endforeach
                            <td> {{Auth::user()->name}}</td>
                            <td> {{Carbon\Carbon::parse($values->created_at)->format('Y-m-d')}}</td>
                            <td>{{$values->quantity_new}}</td>
                        </tr>
                    @endforeach

                @else
                    <tr>
                        <!-- class="text-center" -->
                        <th colspan="5" >No published posts.</th>
                    </tr>

                @endif

                </tbody>
            </table>
        </div>

    </div>
</div>

@include('admin.includes.footer')

