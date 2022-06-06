<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use App\Post;
use  Route;

use Session;
use App\Models\Models\Admin\Category;

class OrderRegisterController extends Controller
 {

public function getReg() 
	{
		$category = Category::all();
      
		return view('pages.orderregister',compact('category'));
	}


	public function postReg(Request $request) {
		
		$request->validate( [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10']);


	$data = array(
			'email' => $request->email,
			'subject' => 'تسجيل طلب اشتراك ',
			'bodyMessage' => $request->message,
			'firstname' => $request->firstname,
			'lastname' => $request->lastname,
			'adress' => $request->adress,
			'mobile' => $request->mobile
			);
 
			

		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('hello@devmarketer.io');
			$message->subject($data['subject']);
		
		});

		Session::flash('success','Your Email was Sent!');

		return redirect('/');

		
	}


}