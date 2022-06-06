@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="wrapper without_header_sidebar">
        <!-- contnet wrapper -->
        <div class="content_wrapper">
            <!-- page content -->
            <div class="registration_page center_container">
                <div class="center_content">
                    <div class="logo">
                        <img src="{{asset('public/panel/assets/images/logo.png')}}" alt="" class="img-fluid">
                    </div>
                    <form action="{{route('register')}}" method="post">
                        @csrf
                        <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Full Name
                                        </label>
                                        <input type="text" class="form-control" placeholder="Enter Your Full Name" name="name" required="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Phone Number
                                        </label>
                                        <input type="text" 
                                        class="form-control @error('phone') is-invalid @enderror" 
                                        value="{{ old('phone') }}" placeholder="Enter Your Phone Number" 
                                        name="phone" required="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Email
                                        </label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                        value="{{ old('email') }}" placeholder="Enter Your Email" name="email" required="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Password
                                        </label>
                                        <input type="password" class="form-control" placeholder="Enter Your Password" name="password" required="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Confirm Password
                                        </label>
                                        <input type="password" class="form-control" placeholder="Confirm Your Password" name="password_confirmation" required="">
                                    </div>

                                <div class="contact_form_button">
                                    <button type="submit" class="btn btn-info">Sign Up</button>
                                </div>
                    </form>
                    <div class="footer">
                        <p>Copyright &copy; 2020. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div><!--/ content wrapper -->
    </div><!--/ wrapper -->
@endsection
