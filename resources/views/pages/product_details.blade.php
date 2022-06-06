@extends('layouts.app')


@section('content')
@include('layouts.menubar')



	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/product_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/product_responsive.css')}}">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="{{asset($product->image_one)}}"><img src="{{asset($product->image_one)}}" alt=""></li>
						<li data-image="{{asset($product->image_two)}}"><img src="{{asset($product->image_two)}}" alt=""></li>
						<li data-image="{{asset($product->image_three)}}"><img src="{{asset($product->image_three)}}" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{asset($product->image_one)}}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">{{$product->category_name}} > {{$product->subcategory_name}}</div>
						<div class="product_name">{{$product->product_name}}</div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text">
							<p>
							{!! str_limit($product->product_details, $limit = 600) !!}
							</p>
						</div>

						<div class="order_info d-flex flex-row">
							<form action="{{url('cart/product/add/'.$product->id)}}" method="post">
								@csrf
								<div class="row">
								

									
									<div class="col-lg-4">
							          	<div class="form-group">
							          		<label for="exampleFormControlSelect1">Quantity</label>
							          		 <input class="form-control" type="number" value="1" pattern="[0-9]" name="qty" min="0" oninput="validity.valid||(value='');">	
							          	</div> 
						          	</div> 

								</div>

								@if($product->discount_price == NULL)
                                    <div class="product_price">${{$product->selling_price}}</div>
                                @else
                                    <div class="product_price">${{$product->discount_price}}
                                        <span>
                                            <strike>${{$product->selling_price}}</strike>
                                        </span>
                                    </div>
                                @endif

								<div class="button_container">
									<button type="submit" class="button cart_button">Add to Cart</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
								
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Product Details</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<nav>


					<ul class="nav nav-tabs">
					   <li><a href="#a" data-toggle="tab">Product Details</a></li>
					   <li><a href="#b" data-toggle="tab">Video Link</a></li>
					   <li><a href="#c" data-toggle="tab">Product Review</a></li>
					</ul>

					<div class="tab-content">
					   <div class="tab-pane active" id="a"><br>{!! $product->product_details !!}</div>
					   
					   	
					   
					   	<div class="tab-pane" id="b">
					   		@if($product->video_link == NULL)
					   			<br><h4>No Link Available Currently</h4>
					   		@else
					   			<br><a href="{{$product->video_link}}">{{!! $product->video_link !!}}</a>
					   		@endif
					   		
					   	</div>
					   
					   
					   <div class="tab-pane" id="c"><br>

					   		<div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>


					   </div>
					</div>

					<!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
  						<li class="nav-item" role="presentation">
    						<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
    							Product Details
    						</button>
  						</li>
  						<li class="nav-item" role="presentation">
    						<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Video Link</button>
  						</li>
  						<li class="nav-item" role="presentation">
    						<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
  						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
  						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
  						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  						<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
					</div> -->

				</div>
			</div>
		</div>
	</div>

	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" 
	src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="0lLHFtZ6">
		
	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection