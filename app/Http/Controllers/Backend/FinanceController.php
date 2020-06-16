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
    	$instalment_day = $object['instalment_day']; 
    	$loan = LoanMast::create($data);
    	$this->instalment_create($premiums,$instalment_day,$loan);
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
    	$instalment_day = $object['instalment_day']; 
    	$loan = LoanMast::find($id);
    	$loan->update($data);
    	InstalmentMast::where('loan_mast_id',$id)->delete();
    	$this->instalment_create($premiums,$instalment_day,$loan);
    	return "Success";
    }
    public function show($id){
    	return view('backend.finance.show');
    }
    public function delete($id){

    }
    public function validation($request){
    	$data = [
    		'finance_amount' => $request->finance_amount,
    		'no_of_instalment' => $request->no_of_instalment, 
    		'interest' => $request->interest, 
    		'vehicle_type' => $request->vehicle_type 
    	];

    	$premiums = $request->premium;
    	$instalment_day = $request->instalment_day;
    	$object = [
    		'data' => $data,
    		'premiums' => $premiums,
    		'instalment_day' => $instalment_day,
    	];
    	return $object;
    }
    public function instalment_create($premiums, $instalment_day,$loan){
    	$i =1 ;
    	foreach ($premiums as $key => $premium) {
    		$data = [
    			'loan_mast_id' => $loan->id,
    			'premium'	=> $premium,
    			'instalment_day' => $instalment_day[$key],
    			'instalment_id' => 'tf_'.$loan->id.'_'.$i++,
    		];	
    		InstalmentMast::create($data);
    	}
    }


    public function fetch($vehicle_type){
    	$loans = LoanMast::where('vehicle_type',$vehicle_type)->where('status','1')->get();
    	return $loans;
    }
    public function loan_fetch($id){
    	$loan = LoanMast::with('instalments')->where('id',$id)->first();
    	return view('backend.clients.loan.instalment_list',compact('loan'));
    }
}
