<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Client;
use App\Models\ClientLoan;
use App\Models\LoanMast;
use App\Models\Instalment;
use PaytmWallet;
use Auth;
class PaymentController extends Controller
{
	public function index(){
		$payments = Payment::all();
		return view('backend.payment.index');
		
	}
    public function show($id){
    	$instalment = Instalment::with('client')->find($id);

    	return view('backend.payment.payment',compact('instalment'));
    }
    public function store(Request $request){
	    $input = $request->validate([
	        'name' => 'required',
	        'mobile' => 'required',
        	'address' => 'required',
	    ]);
	    $input['order_id'] = $request->mobile.rand(1,100);
	    $input['amount'] = $request->amount;
      $input['payment_mode'] = '2';

	    $instalment = Instalment::find($request->instalment_id);
	    // return $instalment;
		// $input['client_id'] = $instalment->client_id;	   
		$input['instalment_id'] = $instalment->id;	   
		$input['loan_id'] = $instalment->loan_id;	   

		Payment::create($input);

    	// return $request->all();

    	$payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' => $input['order_id'],
          'user' => Auth::user()->id,
          'mobile_number' => '7828773421',
          'email' => 'ritesh@laxyo.in',
          'amount' => '1',
          'callback_url' => url('api/payment/status')
        ]);


        return $payment->receive();
    	
    }
    public function paymentCallback()
    {
    	// dd("hello");
        $transaction = PaytmWallet::with('receive');
        // dd($transaction);

        $response = $transaction->response();
        $order_id = $transaction->getOrderId();
        $amount = $transaction->getAmount();

        if($transaction->isSuccessful()){
          Payment::where('order_id',$order_id)->update(['status'=>2,'payment_mode' => '2', 'transaction_id'=>$transaction->getTransactionId()]);
          $pay = Payment::where('order_id',$order_id)->first();
          
          Instalment::where('id',$pay->instalment_id)->update(['status' => '2','pay' => '2','amount_due' => $amount]);
          return redirect()->route('loan.show',$pay->loan_id)->with('success','Instalment Paid Successfully');

        }else if($transaction->isFailed()){
          Payment::where('order_id',$order_id)->update(['status'=>1, 'transaction_id'=>$transaction->getTransactionId()]);
          dd('Payment Failed.');

        }

    }    
    // public function payment_status(Request $request){
    // 	return $request->all();
    // }

    public function instalment_reciept($id){
      $instalment = Instalment::with('client','client_loan','payment')->find($id);
      // return $instalment;
      return view('backend.payment.instalment_reciept',compact('instalment'));
    }
    public function instalment_fetch(){

      $instalment = Instalment::with('client')->find(request()->id);

      return $instalment;
    }

    public function instalment_pay(Request $request){
      $input = $request->validate([
          'name' => 'required',
          'mobile' => 'required',
          'address' => 'required',
      ]);
      $input['order_id'] = $request->mobile.rand(1,100);
      $input['amount'] = $request->amount;
      $input['payment_mode'] = $request->payment_mode;

      $instalment = Instalment::find($request->instalment_id);
          
      $input['instalment_id'] = $instalment->id;     
      $input['loan_id'] = $instalment->loan_id;    

      Payment::create($input);
      $instalment->update(['status' => '2','pay' => '1','amount_due' => $input['amount']]);
        return back()->with('success','Instalment Paid');
    }
}
