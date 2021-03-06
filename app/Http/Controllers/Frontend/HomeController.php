<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
class HomeController extends Controller
{
    public function index(){

    	return view('frontend.home');
    }

    public function contact(Request $request){
      // return $request->all();
       $data =  $request->validate([
            'name'    => 'required|max:150|min:3',
            'mobile'   => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
       Contact::create($data);
       return "OK";
    }
}
