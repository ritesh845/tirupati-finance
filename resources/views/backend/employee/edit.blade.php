@extends('backend.layouts.main')
@section('page_name','Employee')
@section('content')
<div class="row">	
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				Employee Create
				<a href="{{route('employee.index')}}" class="btn btn-sm btn-primary pull-right ml-2"><i class="fa fa-angle-left"></i> Back</a>	
			</div>
			<div class="card-body">
				{{Form::open(array('url' => 'employee/'.$employee->id, 'method' => 'post'))}}	
				@method('patch')		
				<div class="row">
					<div class="col-md-6 form-group">
						{{Form::label('name','Employee Name',['class'=>'required'])}}
						{{Form::input('text','name',old('name') ?? $employee->name,['class'=>'form-control','placeholder'=>'Employee Name','required'=>'required'])}}
						@error('name')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('mobile','Mobile Number',['class'=>'required'])}} <span class="text-muted"> (Employee mobile as username)</span>
						{{Form::input('text','mobile',old('mobile') ?? $employee->mobile,['class'=>'form-control','placeholder'=>'Mobile Number','required'=>'required','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
						@error('mobile')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('email','Email Address')}}
						{{Form::input('email','email',old('email') ?? $employee->email,['class'=>'form-control','placeholder'=>'Client Email'])}}
						@error('email')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('aadhar_card','Aadhar Card',['class'=>'required'])}}
						{{Form::input('text','aadhar_card',old('aadhar_card') ?? $employee->aadhar_card,['class'=>'form-control','placeholder'=>'Enter Aadhar Card','required' => 'required','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
						@error('aadhar_card')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('pan_card','PAN Card Number')}}
						{{Form::input('text','pan_card',old('pan_card') ?? $employee->pan_card,['class'=>'form-control','placeholder'=>'Enter PAN Card Number'])}}
						@error('pan_card')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('address','Address',['class'=>'required'])}}
						{{Form::input('text','address',old('address')  ?? $employee->address,['class'=>'form-control','placeholder'=>'Enter Address'])}}
						@error('address')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						{{Form::hidden('password','')}}
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

		@if($message = Session::get('success'))
			$.notify("{{$message}}",'success');
		@endif
	    $('.required').append('<span class="text-danger"><b> * </b></span>');
	});
</script>
@endsection