@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Product List</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Product List
                    <a href="{{route('add.product')}}" class="btn btn-sm btn-warning" style="float: right">Add New
                    </a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">Product Code</th>
                            <th class="wd-15p">Product Name</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-15p">Category</th>
                            
                            <th class="wd-15p">Quantity</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $row)
                            <tr>
                                <td>{{ $row->product_code }}</td>
                                <td>{{ $row->product_name }}</td>
                                <td><img src="{{URL::to($row->image_one)}}" height="50px;" width="50px;" alt="ha"></td>
                                <td>{{ $row->category_name }}</td>
                               
                                <td>{{ $row->product_quantity }}</td>
                                <td>
                                    @if($row->status == 1)
                                        <span class="badge badge-success">Available</span>
                                    @else
                                        <span class="badge badge-danger">UnAvailable</span>
                                    @endif

                                </td>

                                <td>
                                    <a href="{{URL::to('edit/product/'.$row->id) }}" class="btn btn-sm btn-info" title="edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{URL::to('delete/product/'.$row->id) }}" class="btn btn-sm btn-danger" title="delete" id="delete"><i class="fa fa-trash"></i></a>
                                    <a href="{{URL::to('view/product/'.$row->id) }}" class="btn btn-sm btn-warning" title="Show"><i class="fa fa-eye"></i></a>

                                    @if($row->status == 1)
                                        <a href="{{URL::to('inactive/product/'.$row->id) }}" class="btn btn-sm btn-danger" title="disable product"><i class="fa fa-toggle-off"></i></a>

                                    @else
                                        <a href="{{URL::to('active/product/'.$row->id) }}" class="btn btn-sm btn-info" title="enable product"><i class="fa fa-toggle-on"></i></a>

                                    @endif



                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->


        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->



@endsection

