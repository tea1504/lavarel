<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactMailer;
use Mail;

class FrontendController extends Controller
{
    function contact(){
        return view('frontend.contact');
    }
    function sendMailContactForm(Request $request){
        $input = $request->all();
        Mail::to('tranvanhoa15042000@gmail.com')->send(new ContactMailer($input));
    }
}
