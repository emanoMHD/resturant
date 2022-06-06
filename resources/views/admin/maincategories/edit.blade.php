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
           
                                    
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form"
                                              action="{{route('admin.maincategories.update',$mainCategory -> id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <input name="id" value="{{$mainCategory -> id}}" type="hidden">

                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{$mainCategory -> photo}}"
                                                        class="rounded-circle  height-150" alt="صورة القسم  ">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label> Photo </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> Details </h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Category Name
                                                                - {{__('messages.'.$mainCategory -> translation_lang)}} </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$mainCategory -> name}}"
                                                                   name="category[0][name]">
                                                            @error("category.0.name")
                                                            <span class="text-danger"> the lable is required</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6 hidden">
                                                   
                                                   
                                                   
                                                        <div class="form-group">
                                                            <label for="projectinput1"> abbr
                                                             language {{__('messages.'.$mainCategory -> translation_lang)}} </label>
                                                            <input type="text" id="abbr"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$mainCategory -> translation_lang}}"
                                                                   name="category[0][abbr]">

                                                            @error("category.0.abbr")
                                                            <span class="text-danger">the lable is required</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1"
                                                                   name="category[0][active]"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   @if($mainCategory -> active == 1)checked @endif/>
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">Status {{__('messages.'.$mainCategory -> translation_lang)}} </label>

                                                            @error("category.0.active")
                                                            <span class="text-danger"> </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> Back
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>Update
                                                </button>
                                            </div>
                                        </form>

                                      

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
