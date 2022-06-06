@extends('admin.admin_layouts')

@section('admin_content')



	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_responsive.css') }}">

	<!-- Contact Info -->

	<div class="contact_info">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="images/contact_1.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Name</div>
								<div class="contact_info_text">{{ $message->name }}</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="images/contact_1.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Phone</div>
								<div class="contact_info_text">{{ $message->phone }}</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="images/contact_2.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Email</div>
								<div class="contact_info_text">{{ $message->email }}</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="images/contact_3.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Message</div>
								<div class="contact_info_text">{{ $message->message }}</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>


@endsection