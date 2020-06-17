<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Employee;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\SendCode;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('backend.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);
       $user =  $this->account_create($request);
        $employee = [
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'address' => $request->address,
            'aadhar_card' => $request->aadhar_card,
            'pan_card' => $request->pan_card,
            'user_id' => $user->id,
        ];
        Employee::create($employee);
        return redirect()->route('employee.index')->with('success','Employee Created successfully, Username and login password sent to user mobile no.');

        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee =Employee::find($id);
        return view('backend.employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $emp = Employee::find($id);
        $this->validation($request,$emp->user_id);
        $user =  $this->account_create($request,$emp->user_id);
        $employee = [
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'address' => $request->address,
            'aadhar_card' => $request->aadhar_card,
            'pan_card' => $request->pan_card,
            'user_id' => $user->id,
        ];
        $emp->update($employee);
         return redirect()->route('employee.index')->with('success','Employee Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function account_create($request,$user_id=null){
        $data = [
            'name'              => $request->name,
            'mobile'            => $request->mobile,
            'email'             => $request->email, 
            'email_verified_at' => date('Y-m-d'),
            'mobile_verified_at'=> date('y-m-d'),
            'otp'               => null, 
            'status'            => 'A', 
        ];


        if($user_id !=null){
            $user = User::find($user_id);
            if($user->mobile != $request->mobile){
                $send =[
                    'message' => 'Tirupati Finance change your login username: '.$request->mobile.'we can not change password, login to www.tirupati-finance.com',
                    'mobile' => $request->mobile
                ]; 
                SendCode::sendCode($send);
            }
            $user->update($data);
        }else{
            $data['password'] = Hash::Make($request->password);
            $user = User::create($data);
            $send =[
                'message' => 'Welcome to Tirupati Finance, Your Login Username'.$request->mobile.' and password :'.$request->password.' login to www.tirupati-finance.com',
                'mobile' => $request->mobile
            ]; 
            SendCode::sendCode($send);
            $user->assignRole('employee');
        }
        return $user;
    }

    public function validation($request,$user_id=null){
        $request->validate([
            'name'          => 'required|min:3|max:191',
            'mobile'        => 'required|min:10|max:10|unique:users,mobile,'.$user_id,
            'email'         => 'nullable|email',
            'address'       => 'required',
            'aadhar_card'   => 'nullable',
            'pan_card'      => 'nullable',
            'password'      => 'nullable|min:8|max:191',
        ]);
    }
    public function employee_data($request,$user){

    }
}
