@extends('admin.admin_layouts')

@section('admin_content')
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Category Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Category List
                    <a href="#" class="btn btn-sm btn-warning" style="float: right" data-toggle="modal" data-target="#modaldemo3">Add New</a>
                </h6>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                <div>
                                    <a href="{{route('admin.maincategories.create')}}"
                                     class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">create MainCategory</a></div>
                                    <h4 class="card-title">All Main Categories </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                               
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th> Category Name </th>
                                                <th> Category Language</th>
                                                 <th> Category Status</th>
                                                 <th>Category Photo</th>
                                                <th>Category Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($categories)
                                                @foreach($categories as $category)
                                                    <tr>
                                                        <td>{{$category -> name}}</td>
                                                        <td>{{'ar'}}</td>
                                                        <td>{{$category -> getActive()}}</td>
                                                        <td> <img style="width: 150px; height: 100px;" src="{{$category -> 	photo}}"></td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.maincategories.edit',$category -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                <a href="{{route('admin.maincategories.delete',$category -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>


                                                                <a href="{{route('admin.maincategories.status',$category -> id)}}"
                                                                   class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                                    @if($category -> active == 0)
                                                                      active
                                                                        @else
                                                                      Cancel
                                                                    @endif
                                                                </a>


                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
