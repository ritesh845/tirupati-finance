<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\LoanMast;
use App\Models\InstalmentMast;
class FinanceController extends Controller
{
    public function index(){
    	$loans = LoanMast::where('vehicle_type','1')->where('status','1')->get();

    	return view('backend.finance.index',compact('loans'));
    }
    public function create(){

    	return view('backend.finance.create');
    }
    public function store(Request $request){
    	// return $request->all();
    	$object = $this->validation($request);
    	$data = $object['data'];
    	$premiums = $object['premiums']; 
    	// $instalment_day = $object['instalment_day']; 
    	$loan = LoanMast::create($data);
    	$this->instalment_create($premiums,$loan);
    	return "Success";

    }
    public function edit($id){
    	$loan = LoanMast::with('instalments')->where('id',$id)->first();
    	 // return $loan;
    	return view('backend.finance.edit',compact('loan'));
    }
    public function update(Request $request, $id){
    	// return $request->all();
    	$object = $this->validation($request);
    	// return $object;
    	$data = $object['data'];
    	$premiums = $object['premiums']; 
    	// $instalment_day = $object['instalment_day']; 
    	$loan = LoanMast::find($id);
    	$loan->update($data);
    	InstalmentMast::where('loan_mast_id',$id)->delete();
    	$this->instalment_create($premiums,$loan);
    	return "Success";
    }
    public function show($id){
        $loan = LoanMast::with('instalments')->find($id);
        // return $loans;
    	return view('backend.finance.show',compact('loan'));
    }
    public function delete($id){

    }
    public function validation($request){
    	$data = [
    		'finance_amount' => $request->finance_amount,
    		'no_of_instalment' => $request->no_of_instalment,
            'total_amount' => $request->total_amount, 
    		'interest' => $request->interest, 
    		'vehicle_type' => $request->vehicle_type 
    	];

    	$premiums = $request->premium;
    	// $instalment_day = $request->instalment_day;
    	$object = [
    		'data' => $data,
    		'premiums' => $premiums,
    	];
    	return $object;
    }
    public function instalment_create($premiums,$loan){
    	$i =1 ;
    	foreach ($premiums as $key => $premium) {
    		$data = [
    			'loan_mast_id' => $loan->id,
    			'premium'	=> $premium,
    		];	
    		InstalmentMast::create($data);
    	}
    }


    public function fetch($vehicle_type){
    	$loans = LoanMast::where('vehicle_type',$vehicle_type)->where('status','1')->get();
    	return $loans;
    }
    public function loan_fetch(Request $request){
    	$loan = LoanMast::with('instalments')->where('id',$request->id)->first();
        // return $loan;
        $instalment_start_date = $request->instalment_start_date;
        
    	return view('backend.clients.loan.instalment_list',compact('loan','instalment_start_date'));
    }
}
