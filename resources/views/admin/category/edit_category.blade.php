@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Category Update</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Category Update
                </h6>

                <div class="table-wrapper">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li> {{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{url('update/category/'.$category->id)}}" method="post">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                       value="{{$category->category_name}}" name="category_name">
                                <div id="emailHelp" class="form-text">You can enter your new Category here</div>
                            </div>
                            {{--                            <div class="mb-3">--}}
                            {{--                                <label for="exampleInputPassword1" class="form-label">Password</label>--}}
                            {{--                                <input type="password" class="form-control" id="exampleInputPassword1">--}}
                            {{--                            </div>--}}
                            {{--                            <div class="mb-3 form-check">--}}
                            {{--                                <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
                            {{--                                <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
                            {{--                            </div>--}}

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info pd-x-20">Update</button>
                            </div>
                        </div>
                    </form>
                </div><!-- table-wrapper -->
            </div><!-- card -->


        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->



@endsection

