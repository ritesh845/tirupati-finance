@extends('backend.layouts.main')
@section('page_name','Clients')
@section('content')
<div class="row">	
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				Loan Create
				<a href="{{route('client.show',$clientLoan->client_id)}}" class="btn btn-sm btn-primary pull-right ml-2"><i class="fa fa-angle-left"></i> Back</a>	
			</div>
			<div class="card-body">
				{{Form::open(array('url' => 'loan/update/'.$clientLoan->id, 'method' => 'post'))}}
				@method('patch')			
				<div class="row">
					<div class="col-md-6 form-group">
						{{Form::label('financer_name','Financer Name',['class'=>'required'])}}
						{{Form::input('text','financer_name',old('financer_name') ?? $clientLoan->financer_name,['class'=>'form-control','placeholder'=>'Financer Name'])}}
						@error('financer_name')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('hirer_name','Name of Hirer',['class'=>'required'])}}
						{{Form::input('text','hirer_name',old('hirer_name') ?? $clientLoan->hirer_name,['class'=>'form-control','placeholder'=>'Hirer Name','required'=>'required'])}}
						@error('hirer_name')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('make','Make')}}
						{{Form::input('text','make',old('make') ?? $clientLoan->make,['class'=>'form-control','placeholder'=>'Make'])}}
						@error('make')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('vehicle_type','Vehicle Type',['class' => 'required'])}}
						{{Form::select('vehicle_type',VEHICLETYPE,old('vehicle_type') ?? $clientLoan->vehicle_type,['class'=>'form-control','placeholder'=>'Select Vehicle Type'])}}
						@error('vehicle_type')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					
					<div class="col-md-6 form-group">
						{{Form::label('vehicle_name','Vehicle Name',['class' => 'required'])}}
						{{Form::input('text','vehicle_name',old('vehicle_name') ?? $clientLoan->vehicle_name,['class'=>'form-control','placeholder'=>'Vehicle Name'])}}
						@error('vehicle_name')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('vehicle_model','Vehicle Model',['class' => 'required'])}}
						{{Form::input('text','vehicle_model',old('vehicle_model') ?? $clientLoan->vehicle_model,['class'=>'form-control','placeholder'=>'Vehicle Model'])}}
						@error('vehicle_model')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('vehicle_no','Vehicle Number')}}
						{{Form::input('text','vehicle_no',old('vehicle_no') ?? $clientLoan->vehicle_no,['class'=>'form-control','placeholder'=>'Vehicle Number'])}}
						@error('vehicle_no')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('vehicle_chassis_no','Vehicle Chassis Number',['class' => 'required'])}}
						{{Form::input('text','vehicle_chassis_no',old('vehicle_chassis_no') ?? $clientLoan->vehicle_chassis_no,['class'=>'form-control','placeholder'=>'Vehicle Chassis Number'])}}
						@error('vehicle_chassis_no')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('vehicle_engine_no','Vehicle Engine Number',['class' => 'required'])}}
						{{Form::input('text','vehicle_engine_no',old('vehicle_engine_no') ?? $clientLoan->vehicle_engine_no,['class'=>'form-control','placeholder'=>'Vehicle Engine Number'])}}
						@error('vehicle_engine_no')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
				</div>
				<hr>
				<div class="row">
						<div class="col-md-6 form-group">
						{{Form::label('registration_date','Registration Date',['class' => 'required'])}}
						{{Form::input('text','registration_date',old('registration_date') ?? $clientLoan->registration_date,['class' => 'form-control datepicker1','readonly' =>'readonly'])}}
						@error('registration_date')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('instalment_start_date','Instalment Start Date ',['class' => 'required'])}}
						{{Form::input('text','instalment_start_date',old('instalment_start_date') ?? $clientLoan->instalment_date,['class' => 'form-control datepicker1','readonly' =>'readonly'])}}
						@error('instalment_start_date')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('finance_amount','Finance Amount',['class' => 'required'])}}
						<span class="text-muted">(You can't change this)</span>
						{{Form::select('finance_amount',array(),'',['class' => 'form-control','disabled' => 'disabled'])}}
						{{Form::hidden('finance_amount',$clientLoan->loan_mast_id)}}
						@error('finance_amount')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6">
						{{Form::label('total_amount','Total Amount',['class' => 'required'])}}
						{{Form::input('text','total_amount',old('total_amount') ?? $clientLoan->total_amount,['class'=>'form-control','placeholder'=>'0','readonly' => 'readonly'])}}

						@error('total_amount')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('status','Status',['class' => 'required'])}}
						{{Form::select('status',LOANSTATUS,'1',['class' => 'form-control','placeholder' => 'Select Status'])}}
						@error('status')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
				{{-- </div> --}}
					{{-- <div class="col-md-6 form-group">
						{{Form::label('no_of_instalment','No of Instalment',['class' => 'required'])}} <span class="text-muted">(In Month)</span>
						{{Form::input('text','no_of_instalment',old('no_of_instalment'),['class'=>'form-control','placeholder'=>'No of Instalment','readonly' =>'readonly'])}}
						@error('no_of_instalment')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>  --}}
					{{-- <div class="col-md-6 form-group">
						{{Form::label('instalment_date','Instalment Date',['class' => 'required'])}} <span class="text-muted">(Loan	 Instalment Date)</span>
						{{Form::input('text','instalment_date',old('instalment_date'),['class'=>'form-control datepicker','placeholder'=>'Instalment Date','readonly' => 'readonly'])}}

						@error('instalment_date')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div> --}}
					{{-- <div class="col-md-6 form-group">
						{{Form::label('loan_interest','Loan Interest',['class' => 'required'])}} <span class="text-muted">(Paisa In Percent)</span>
						{{Form::input('text','loan_interest',old('loan_interest'),['class'=>'form-control','placeholder'=>'','readonly' => 'readonly'])}}
						@error('loan_interest')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div> --}}
					{{-- <div class="col-md-6 form-group">
						{{Form::label('loan_amount','Loan Amount',['class' => 'required'])}} <span class="text-muted">( In Percent)</span>
						{{Form::input('text','loan_amount',old('loan_amount'),['class'=>'form-control','placeholder'=>'','readonly' => 'readonly'])}}
						@error('loan_amount')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div> --}}
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<h5>Instalment List: (Auto Generated)</h5>
					</div>
					<div class="col-md-12 form-group" id="instalmentBody">
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						{{Form::hidden('client_id',$clientLoan->client_id)}}
						{{Form::submit('Submit',['id' => 'formSubmit'])}}
						
					</div>
				</div>
				{{Form::close()}}

			</div>
		</div>
	</div>
</div>
<script >
	$(document).ready(function() {
		$(function() {
			$('.datepicker1').datepicker({
				format:'yyyy-mm-dd'
			});
		});
		@if($message = Session::get('success'))
			$.notify("{{$message}}",'success');
		@endif
	    $('.required').append('<span class="text-danger"><b> * </b></span>');

	   
		$('select[name="vehicle_type"]').on('change',function(e){
			e.preventDefault();

			var type = $(this).val();
			finance_amount_fetch(type);
		});

		var type = "{{old('vehicle_type') != '' ? old('vehicle_type') : $clientLoan->vehicle_type }}" ;
		if(type !=''){
			var old = "{{old('finance_amount') != '' ? old('finance_amount') : $clientLoan->loan_mast_id }}";
			finance_amount_fetch(type,old);
			var loan_id = "{{$clientLoan->id}}";

			if(loan_id !=''){
				edit_instalment_list(loan_id);
			}
		}

		$('select[name="finance_amount"]').on('change',function(e){
			e.preventDefault();

			var id = $(this).val();
			instalment_list(id);
		});
		// $(document).on("focus", ".datepicker", function () {
		//     $(".datepicker").datepicker({
		//     	format:'yyyy-mm-dd',
		//     });
		// });
		// $('#formSubmit').on('click',function(e){
		// 	e.preventDefault();

		// 	// var finance_amount = $('select[name="finance_amount"]').val();
		// 	// var financer_name = $('financer_name')
		// })
		function finance_amount_fetch(type,old=""){
			$.ajax({
				type:'get',
				url:"/fetch/finance/"+type,
				success:function(res){
					$('select[name="finance_amount"]').empty();
					$('select[name="finance_amount"]').append('<option value="">Select Finance Amount</option>');

					$.each(res,function(i,v){
						$('select[name="finance_amount"]').append('<option value="'+v.id+'" ' + (v.id == old ? 'selected="selected"' : '' )+ ' >'+v.finance_amount+'</option>');
					});
				} 
			});
		}


		function instalment_list(id,instalment_date=""){
			$.ajax({
				type: 'post',
				url: '/finance/loan_fetch/',
				data:{id:id,instalment_date:instalment_date},
				success:function(res){

					// console.log(res)		
					$('#instalmentBody').empty().html(res);
					// $('#tbody').html(res);

				}
			});
		}
		function edit_instalment_list(loan_id){
			$.ajax({
				type: 'get',
				url: '/client_loan_fetch/'+loan_id,
				success:function(res){
					// console.log(res)		
					$('#instalmentBody').empty().html(res);
					// $('#tbody').html(res);
				}
			});
		}
	});
</script>
@endsection