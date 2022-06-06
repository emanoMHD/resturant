@extends('layouts.app')
@section('title', '| Contact')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_responsive.css') }}">
        <div class="contact_info">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

            <div class="col-md-12">
                <h1 style="text-align:center;color:red;font-size:30px;">طلب اشتراك </h1>
                <hr>
                 <form action="{{ url('order/register') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label name="firstname" style= "color:blue ; font-size:18px;">Enter First Name : </label>
                        <input id="firstname" name="firstname" class="form-control">

                    </div>
                    <div class="form-group">
                        <label name="lastname" style= "color:blue ; font-size:18px;">Enter Last Name :</label>
                        <input id="lastname" name="lastname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="adress" style= "color:blue ; font-size:18px;">Enter Your Address: </label>
                        <input id="adress" name="adress" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="mobile" style= "color:blue ; font-size:18px;">Enter Mobile Phone :
                    </label>
                        <input id="mobile" name="mobile"  class="form-control" >
                    </div>
                    
                    <div class="form-group">
                        <label name="email" style= "color:blue ;font-size:18px;">Enter Email :</label>
                        <input id="email" name="email" class="form-control">
                    </div>
                   

                   
                     
                                                        <div class="form-group">
                        <label name="email" style= "color:blue ;font-size:18px;">Select Main Category:</label>
                                        <select class="form-control select2" data-placeholder="Choose category" name="category_id">
                                            <option label="Choose Category"></option>
                                            @foreach($category as $row)
                                            <option value="{{$row->id}}">{{$row->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                
                                           <br>
                                           <br>
                                           <br>
                                            <div class="form-group">
                        <label name="message">Message:</label>
                        <textarea id="message" name="message" class="form-control">Type your message here...</textarea>
                    </div>
                    <!-- <div class="form-group">
                        <label name="subject">Subject:</label>
                        <input id="subject" name="subject" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="message">Message:</label>
                        <textarea id="message" name="message" class="form-control">Type your message here...</textarea>
                    </div> -->

                    <input type="submit" value="Send Message" class="btn btn-success">
                </form>
            </div>
      
</div>
</div>
</div>
<br>
<br>
<br>
@endsection