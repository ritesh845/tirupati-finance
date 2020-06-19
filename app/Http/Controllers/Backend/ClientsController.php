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
use Illuminate\Support\Facades\Hash;
use App\SendCode;
class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $clients = Client::orderBy('name','ASC')->get();
    	return view('backend.clients.index',compact('clients'));
    }
    public function create(){
    	return view('backend.clients.create');
    }
    public function store(Request $request){
        $data = $this->validation($request);

        if($request->hasfile('photo')){
            $data['photo'] = $this->file_upload($request->file('photo'),'photo');
        }
        // die;
        if($request->hasfile('signature')){
           $data['signature'] = $this->file_upload($request->file('signature'),'signature');
        }
        if($request->hasfile('guarantor_signature')){
           $data['guarantor_signature'] =  $this->file_upload($request->file('guarantor_signature'),'signature');
        }
        if($request->hasfile('guarantor_signature1')){
           $data['guarantor_signature1'] = $this->file_upload($request->file('guarantor_signature1'),'signature');
        }

        $user =  $this->account_create($request);
        $data['email'] = $user->email;
        $data['user_id'] = $user->id;
    
        $client = Client::create($data);

        return redirect()->route('client.edit',$client->id)->with('success','Client Added Successfully');
    	// return $client;
        
    }
    public function edit($id){
        $client = Client::find($id);
    	return view('backend.clients.edit',compact('client'));
    }
    public function show($id){
        $client = Client::find($id);
        $clientLoans = ClientLoan::with('instalments','loan_mast')->where('client_id',$id)->orderBy('id','DESC')->get();
        // return $clientLoans;
        return view('backend.clients.show',compact('client','clientLoans'));
    }
    public function update(Request $request, $id){
    	// return $id;
        $client = Client::find($id);
        $data =$this->validation($request,$id,$client->user_id);

        if($request->hasfile('photo')){
          $data['photo'] = $this->file_upload($request->file('photo'),'photo',$client,'photo');
        }
        if($request->hasfile('signature')){
           $data['signature'] = $this->file_upload($request->file('signature'),'signature',$client,'signature');
        }
        if($request->hasfile('guarantor_signature')){
           $data['guarantor_signature'] =  $this->file_upload($request->file('guarantor_signature'),'signature',$client,'guarantor_signature');
        }
        if($request->hasfile('guarantor_signature1')){
           $data['guarantor_signature1'] = $this->file_upload($request->file('guarantor_signature1'),'signature',$client,'guarantor_signature1');
        }


        if($client->email != $request->email){

            User::where('id',$client->user_id)->update(['email' => $request->email]);
           
        }
        $client->update($data);
        return redirect()->route('client.edit',$client->id)->with('success','Client Updated Successfully');

    }
    public function delete($id){
        $client = Client::find($id);
        $loans =  $client->loans()->get();

        foreach ($loans as $loan) {
            foreach($loan->instalments as $instalment){
                if($instalment->payment !=null){
                     $instalment->payment->delete();
                }
                $instalment->delete();
            }
            $loan->delete();
        }
        User::find($client->user_id)->delete();
        
        $client->delete();
        return back()->with('success','Client deleted successfully and client loan and instalment also deleted');

    }

    public function validation($request,$id=null,$user_id=null){
        // ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
       $data =  $request->validate([
            'name'              => 'required|min:4|max:191',
            'father_name'              => 'required|min:4|max:191',
            'email'             => 'nullable|email|',
            'aadhar_card'       => 'required|min:12|max:12|unique:clients,aadhar_card,'.$id,
            'mobile'            => 'required|max:10|min:10|unique:users,mobile,'.$user_id,
            'mobile1'           => 'nullable|max:10|min:10',
            'age'               => 'nullable|min:2|max:2',
            'cast_category'     => 'nullable',
            'pan_card'          => 'nullable|max:10|min:10',
            'address'           => 'required',
            'zip_code'          => 'required|min:6|max:7',
            'registration_date' => 'required|date_format:Y-m-d',
            'bussiness'         => 'nullable|min:3|max:191',
            'bussiness_year'    => 'nullable',
            'office_name'       => 'nullable',
            'office_position'   => 'nullable',
            'office_id_card'    => 'nullable',
            'office_address'    => 'nullable',
            'monthly_income'    => 'nullable',
            'any_income_source' => 'nullable',
            'bank_name'         => 'nullable',
            'guarantor_name'    => 'nullable',
            'guarantor_mobile'  => 'nullable',
            'guarantor_address' => 'nullable',
            'guarantor_income'  => 'nullable',
            'guarantor_bussiness'=> 'nullable',
            'guarantor_position' => 'nullable',
            'guarantor_name1'    => 'nullable',
            'guarantor_mobile1'  => 'nullable',
            'guarantor_address1' => 'nullable',
            'guarantor_income1'  => 'nullable',
            'guarantor_bussiness1'=> 'nullable',
            'guarantor_position1' => 'nullable',
        ]);

        return  $data;

    }
    public function account_create($request){
        $data = [
            'name'              => $request->name,
            'mobile'            => $request->mobile,
            'email'             => $request->email, 
            'email_verified_at' => date('Y-m-d'),
            'mobile_verified_at' => date('y-m-d'),
            'otp'               => null, 
            'status'            => 'A',
        ];
        $password = str_limit($request->name,3,'@'.str_limit($request->aadhar_card,4,''));

        $data['password'] = Hash::Make($password);
        $sendData = [
            'message' => 'Welcome to Tirupati Finance. Your username: '.$request->mobile.' and password: '.$password.' login to www.tirupati-finance.com ',
            'mobile' => $request->mobile 
        ]; 

        SendCode::sendCode($sendData);       
       
        $user =  User::create($data);
        $user->assignRole('client');
        return $user;
    }

    public function file_upload($file,$folder,$client = [],$fieldName=null){      
        if(!empty($client) !=0){
            if($client->$fieldName != null){
               Storage::delete('public/'.$client->$fieldName);
            }
        }
        $name =  time().'_'.$file->getClientOriginalName();
        $file->storeAs('public/'.date('Y').'/'.date('M').'/'.$folder, $name);
        $path = date('Y').'/'.date('M').'/'.$folder.'/'.$name;
        return $path;
    }

   
    public function loanCreate($id){
        $client = Client::find($id);

        return view('backend.clients.loan.create',compact('client'));
    }
    public function loanSubmit(Request $request){
        // return $request->all();
        $object = $this->loan_validation($request);
        $loan = $object['loan'];        
        $data = $object['data'];        

        $clientLoan = ClientLoan::create($data);

        if(count($request->premium) !=0){
            $i = 1;
            foreach ($request->premium as $key => $premium) {
                $inst = [
                    'client_id'      => $request->client_id,
                    'loan_id'        => $clientLoan->id,
                    'loan_mast_id'   => $loan->id,
                    'instalment_date'=> $request->instalment_date[$key],
                    'instalment_no'  => $request->instalment_no[$key],
                    'amount'         => $premium,
                    'status'         => $request->status, 
                ];
                if($key != 0){
                    $inst['after'] = '1'; 
                }
               Instalment::create($inst);
            }
        }

       return back()->with('success','Client Loan Created Successfully');

    }
    public function loanEdit($id){
        $clientLoan = ClientLoan::with('instalments','loan_mast')->where('id',$id)->first();
        // return $clientLoan;
        return view('backend.clients.loan.edit',compact('clientLoan'));
    }
    public function loanUpdate(Request $request, $id){
        $object =$this->loan_validation($request);
        $loan = $object['loan'];        
        $data = $object['data']; 
        $clientLoan = ClientLoan::find($id);
        $clientLoan->update($data); 

        if(count($request->premium) !=0){
            $i = 1;
            foreach ($request->premium as $key => $premium) {
                $inst = [
                    'client_id'      => $request->client_id,
                    'loan_id'        => $clientLoan->id,
                    'loan_mast_id'   => $loan->id,
                    'instalment_date'=> $request->instalment_date[$key],
                    'amount'         => $premium,
                    'status'         => $request->status, 
                ];
                if($key != 0){
                    $inst['after'] = '1'; 
                }

                Instalment::find($request->instalment_id[$key])->update($inst);
            }
        }


          return back()->with('success','Client Loan Updated Successfully');
    }
    public function loanShow($id){
        $clientLoan = ClientLoan::with('instalments','loan_mast')->find($id);
        // return $clientLoan;
        return view('backend.clients.loan.show',compact('clientLoan'));
    }
    public function loanDelete($id){
        $loan = ClientLoan::find($id);
        foreach ($loan->instalments as $instalment) {
            if($instalment->payment !=null){
                $instalment->payment->delete();
            }
            $instalment->delete();
        }
        $loan->delete();
        return back()->with('success','Client loan and instalment also deleted');
    }
    public function client_loan_fetch($id){

        $instalments = Instalment::where('loan_id',$id)->get();

        return view('backend.clients.loan.edit_instalment_list',compact('instalments'));

    }
    public function loan_validation($request){
        // return $request->all();
         $request->validate([
            'financer_name'     => 'required|min:3|max:191',
            'make'              => 'nullable|min:3|max:191',
            'hirer_name'        => 'required|min:3|max:191',
            'vehicle_type'      => 'required|not_in:""',
            'vehicle_name'      => 'required|min:3|max:191',
            'vehicle_model'     => 'required|min:3|max:191',
            'vehicle_no'        => 'nullable|min:3|max:191',
            'vehicle_chassis_no'=> 'required|min:3|max:191',
            'vehicle_engine_no' => 'required|min:3|max:191',
            'finance_amount'    => 'required|not_in:""',
            'status'            => 'required|not_in:""',
            'registration_date' => 'required|date_format:Y-m-d',
            'instalment_start_date'=> 'required|date_format:Y-m-d',
            'total_amount'      => 'required'
        ]);

        $loan = LoanMast::find($request->finance_amount);

        $data = [
            'financer_name'     => $request->financer_name,
            'hirer_name'        => $request->hirer_name,
            'client_id'         => $request->client_id,
            'make'              => $request->make,
            'loan_mast_id'      => $loan->id,
            'finance_amount'    => $loan->finance_amount,
            'vehicle_type'      => $request->vehicle_type,
            'vehicle_name'      => $request->vehicle_name,
            'vehicle_model'     => $request->vehicle_model,
            'vehicle_no'        => $request->vehicle_no,
            'vehicle_chassis_no'=> $request->vehicle_chassis_no,
            'vehicle_engine_no' => $request->vehicle_engine_no,
            'registration_date' => $request->registration_date,
            'instalment_date'   => $request->instalment_start_date,
            'status'            => $request->status,
            'total_amount'      => $request->total_amount 
        ];

        return $object= [
            'data' => $data,
            'loan' => $loan,
        ];

    }
}
