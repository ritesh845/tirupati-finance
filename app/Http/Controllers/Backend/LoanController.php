<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Models\Client;
use App\Models\LoanMast;
use App\Models\ClientLoan;
use App\Models\Instalment;
use Auth;
class LoanController extends Controller
{
    public function  index(){
    	$client = Client::where('user_id',Auth::user()->id)->first();
    	$loans = ClientLoan::with('instalments','loan_mast')->where('client_id',$client->id)->orderBy('id','DESC')->get();

    	return view('backend.loans.index',compact('loans'));
    }
    public function noc_form($id){
        $loan =  ClientLoan::with('client')->find($id);
        // return $loan;
        return view('backend.clients.loan.noc.index',compact('loan'));
    }
}
