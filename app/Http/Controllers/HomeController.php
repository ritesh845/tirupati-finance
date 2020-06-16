<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\User;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.home');
    }

    public function profile(){
       $user =  User::find(Auth::user()->id);
       return view('backend.profile.index',compact('user'));
    }
   
    public function contact(){
        $contacts = Contact::orderBy('id','DESC')->get();
        return view('backend.contact.index',compact('contacts'));
    }
    public function contactDelete($id){
        Contact::find($id)->delete();
        return back()->with('success','Contact Deleted Successfully');
    }
}
