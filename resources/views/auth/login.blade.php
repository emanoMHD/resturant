

@extends('layouts.app')

@section('content')
    
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_responsive.css') }}">
    
    <div class="contact_form" >

   

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
          
                <div class="row">
                    <div  class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
                        <div class="contact_form_container">
                      
               
                        <h2 class="form-title">Sign up</h2>
                        <form  action="{{route('register')}}" method="POST" class="register-form" id="contact_form">
                        @csrf
                        <div class="form-group">
                            <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"  ></figure>
                        <a href="#" class="signup-image-link">I am already member</a>
                    </div>
                               
                            </div>
                           


                            
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
                    </div>
                   
                </div>
           

       

        <!-- Sing in  Form -->
       
        <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
                        <div class="contact_form_container">
                            <div class="contact_form_title text-center">Sign Up</div>
           <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form  action="{{route('login')}}" method="POST" class="register-form" id="contact_form">
                        @csrf
                        <div class="contact_form_text">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Email Or Phone
                                        </label>
                                        <input type="email" 
                                        class="form-control @error('email') is-invalid @enderror" 
                                        value="{{ old('email') }}" placeholder="name@example.com" name="email" required="">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Password
                                        </label>
                                        <input type="password" 
                                        class="form-control @error('password') is-invalid @enderror" 
                                        name="password" required="">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> 
                                <div class="contact_form_button">
                                    <button type="submit" class="btn btn-info">Login</button>
                                </div>
                        </form>
                        <br>
                            <a href="{{ route('password.request') }}">I forgot my password</a>
                            <br><br>
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fab fa-facebook-square"></i> Login in with Facebook  
                            </button>

                            <button type="submit" class="btn btn-danger btn-block">
                                <i class="fab fa-google"></i> Login in with Google  
                            </button>

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

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
