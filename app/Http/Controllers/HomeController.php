<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
// use App\Models\Client;
use App\User;
use Auth;
use App\Models\Client;
use App\Models\Payment;
use App\Models\Employee;
// use App\Models\Contact;
use App\Models\Instalment;
use App\Models\ClientLoan;
use App\Models\Message;
use App\SendCode;
use Carbon\Carbon;
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
        $myloans = 0;
        if(Auth::user()->hasRole('client')){
            $client = Client::where('user_id',Auth::user()->id)->select('id');
            print_r($client);
           die; 
            $myloans = ClientLoan::where('client',$client)->count();
        }
        $clients = Client::count();
        $contacts = Contact::count();
        $loans = ClientLoan::where('status','1')->count();
        $all_loans = ClientLoan::count();
        $instalments = Instalment::with('client')->whereDate('instalment_date',date('Y-m-d'))->paginate('5');
        $employees = Employee::count();
        
        $month_payments = Payment::whereMonth('created_at',date('m'))->sum('amount');
        $today_payments = Payment::where('created_at',date('Y-m-d'))->sum('amount');
        $payments = Payment::sum('amount');


        return view('backend.home',compact('payments','clients','loans','all_loans','instalments','employees','today_payments','month_payments','contacts','myloans'));
        
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

    public function beforeDateInstalmentReminder(){
        $instalments = Instalment::with('client')->where('pay',0)->get();
        $todayDate = Carbon::now();
        $days_tow = date('Y-m-d',strtotime(Carbon::now()->addDays('+2')));
        $days_four = date('Y-m-d',strtotime(Carbon::now()->addDays('+4')));
        

        foreach ($instalments as $instalment) {
            
            $inst = Instalment::find($instalment->id);
            
            // echo "<br>";
            if(strtotime($days_tow) == strtotime(date('Y-m-d',strtotime($instalment->instalment_date)))){
                $send = [
                    'message' => 'Hello sir/mam, after 2 days your instalment date:- '.date('d-m-Y',strtotime($instalment->instalment_date)).' pay your instalment amount:- '.$instalment->amount. ', otherwise you will pay late days amount.',
                    'mobile' => $instalment->client->mobile
                ];  
                // print_r($send);
                // echo "<br>";
                SendCode::sendCode($send);      
            }

            if(strtotime($days_four) == strtotime(date('Y-m-d',strtotime($instalment->instalment_date)))){
                $send = [
                    'message' => 'hello 4 days',
                    'mobile' => $instalment->client->mobile
                ]; 
                // print_r($send);
                SendCode::sendCode($send);  
            }

            if($todayDate->gt(Carbon::parse($instalment->instalment_date))){
               if($todayDate->diffInDays(Carbon::parse($instalment->instalment_date)) <= PENALTYDAYS ){
                
                    $upDate = [
                        'late_days' => $inst->late_days + 1,
                        'late_amount' => $inst->late_amount + PENALTY
                    ];
                    $inst->update($upDate);    
               }
               elseif($todayDate->diffInDays(Carbon::parse($instalment->instalment_date)) == PENALTYDAYS + 1){
                        $upDate = [
                            'late_days' => $inst->late_days + 1,
                            'late_amount' => PENALTYMONTH
                        ];
                        $inst->update($upDate);  
               }else{
                    $late_days = $instalment->late_days + 1; 
                    // echo $todayDate->diffInDays(Carbon::parse($instalment->instalment_date)) ;
                    if($todayDate->diffInDays(Carbon::parse($instalment->instalment_date)) ==  $late_days){
                        // echo $instalment->instalment_date;
                        $upDate = [
                            'late_amount' => $inst->late_amount + PENALTYMONTH
                        ];
                    } 
                    $upDate['late_days'] = $late_days;
                    $inst->update($upDate);  
               }
            }
            # code...
        }
    }
    // public function afterInstalmentLateDays(){
    //     $date =Carbon::now();

    // }

}
