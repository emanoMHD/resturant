@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                              
                                <li class="breadcrumb-item active">إضافة مشترك
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> إضافة مشترك </h4>
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
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.parts.store')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">
                                            <div class="col-4">
                                            <div class="form-group">
                                            <label for="part_name">part name</label>
                                            <input type="text" name="part_name" class ="form-control">
                                            @error('part_name')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                                            
                                            </div>
                                            </div>
                                            <div class="col-4">
                                            <div class="form-group">
                                            <label for="part_email">part email</label>
                                            <input type="text" name="part_email" class ="form-control">
                                            @error('part_email')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                                            
                                            </div>
                                            </div>
                                            <div class="col-4">
                                            <div class="form-group">
                                            <label for="part_mobile">part mobile</label>
                                            <input type="text" name="part_mobile" class ="form-control">
                                            @error('part_mobile')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                                            
                                            </div>
                                            </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-4">
                                            <div class="form-group">
                                            <label for="company_name">Company name</label>
                                            <input type="text" name="company_name" class ="form-control">
                                            @error('company_name')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                                            
                                            <div class="row">
                                            <div class="col-4">
                                            <div class="form-group">
                                            <label for="Category_name">Category name</label>
                                            <input type="text" name="Category_name" class ="form-control">
                                            @error('Category_name')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                                            

                                            </div>
                                            </div>
                                            <div class="col-4">
                                            <div class="form-group">
                                            <label for="part_city">City name</label>
                                            <input type="text" name="part_city" class ="form-control">
                                            @error('part_city')<span class="help-block text-danger">{{$message}}</span>
                                            @enderror
                                            
                                          
 <div class="text-right pt-3">
<button type="submit" name="save"  class="btn btn-primary" >Save</button>
                                           </div>
@endsection
