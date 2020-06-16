@extends('backend.layouts.main')
@section('page_name','Loan Payment')
@section('content')
<div class="row">	
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				Loan Payment
				<a href="{{route('client.show',$instalment->client_id)}}" class="btn btn-sm btn-primary pull-right ml-2"><i class="fa fa-angle-left"></i> Back</a>	
			</div>
			<div class="card-body">
				{{Form::open(array('route' => 'payment.store', 'method' => 'post'))}}
				<div class="row">					
					<div class="col-md-6 form-group">
						{{Form::label('name','Full Name',['class'=>'required'])}}
						{{Form::input('text','name',old('name') ?? $instalment->client->name,['class'=>'form-control','placeholder'=>'Client Name','required'=>'required'])}}
						@error('name')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					
					<div class="col-md-6 form-group">
						{{Form::label('mobile','Mobile Number',['class'=>'required'])}}
						{{Form::input('text','mobile',old('mobile') ?? $instalment->client->mobile,['class'=>'form-control','placeholder'=>'Mobile Number','required'=>'required','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
						@error('mobile')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('address','Address',['class'=>'required'])}}
						{{Form::input('text','address',old('address') ?? $instalment->client->address,['class'=>'form-control','placeholder'=>'Enter Address'])}}
						@error('address')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('premium','Premium Amount',['class'=>'required'])}} <span class="text-muted">(You Can't Change this)</span>
						{{Form::input('text','premium',$instalment->amount,['class'=>'form-control','readonly' => 'readonly'])}}
						@error('premium')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('late_days','Late Days',['class'=>'required'])}} <span class="text-muted">(You Can't Change this)</span>
						{{Form::input('text','late_days',$instalment->late_days,['class'=>'form-control','readonly' => 'readonly'])}}
						@error('late_days')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('late','Late Amount',['class'=>'required'])}} <span class="text-muted">(You Can't Change this)</span>
						{{Form::input('text','late',$instalment->late_amount,['class'=>'form-control','readonly' => 'readonly'])}}
						@error('late')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('amount','Total Pay Amount',['class'=>'required'])}} <span class="text-muted">(Premium Amount + Late Amount)</span>
						{{Form::input('text','amount',($instalment->late_amount + $instalment->amount),['class'=>'form-control','readonly' => 'readonly'])}}
						@error('amount')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-12"> 
						{{Form::hidden('instalment_id',$instalment->id)}}
						{{Form::submit('Pay To Paytm' , ['class' => 'btn btn-sm btn-success'])}}
						
					</div>
				</div>
				{{Form::close()}}

			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
	    $('.required').append('<span class="text-danger"><b> * </b></span>');
	});
</script>
@endsection