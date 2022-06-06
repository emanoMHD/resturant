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

                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                              
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th>رقم الفاتورة</th>
                                              
                                                <th>اسم الزبون</th>
                                                <th> تاريخ الفاتورة</th>
                                             
                                               
                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($invoices)
                                                @foreach($invoices as $invoice)
                                                    <tr>
                                                        <td>{{$invoice -> invoice_number}}</td>
                                                        <td>{{$invoice ->customer_name}}</td>
                                                       
                                                        <td>{{$invoice ->invoice_date}}</td>
                                                      
                                                       
                                                       

                                                    
                                                      
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.invoices.edit',$invoice-> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                <a href="{{route('admin.invoices.delete',$invoice-> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>


                                                                <a href="{{route('admin.invoices.show',$invoice-> id)}}"
                                                                   class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">عرض الفاتورة</a>


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
