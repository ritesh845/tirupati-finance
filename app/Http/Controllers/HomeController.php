<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
// use App\Models\Client;
use App\User;
use Auth;
use App\Models\Client;
use App\Models\Message;
use App\SendCode;
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
    public function message(){
       $messages =  Message::orderBy('id','DESC')->get();
       return view('backend.message.index',compact('messages'));
    }
    public function messageCreate(){
       $clients = Client::pluck('name','id');
       return view('backend.message.create',compact('clients'));
    }
    public function messageStore(Request $request){
        $request->validate([
            'message' => 'required|min:5|max:165',
            'client_id' => 'required|not_in:""',
        ]);

        $mobiles = Client::whereIn('id',$request->client_id)->pluck('mobile');
        // return $mobiles; 


        foreach ($mobiles as $mobile) {
            $sendData = [
                'message' => $request->message,
                'mobile' => $mobile 
            ]; 


            if(SendCode::sendCode($sendData)){
                $sendData['status'] = '1';  
            }  
            Message::create($sendData);
        }
        return back()->with('success',"Message Sent Successfully");
       

    }

}
