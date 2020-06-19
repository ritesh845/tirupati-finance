@extends('backend.layouts.main')
@section('page_name','Clients')
@section('content')
<div class="row">	
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-12">
						Client Create
						<a href="{{route('client.index')}}" class="btn btn-sm btn-primary pull-right ml-2"><i class="fa fa-angle-left"></i> Back</a>
					</div>
				</div>
				<hr>
				<ul class="nav nav-tabs">
				    <li class="nav-item">
				      <a class="nav-link active" data-toggle="tab" href="#basic_details">Basic Details</a>
				    </li>
				   {{--  <li class="nav-item">
				      <a class="nav-link" data-toggle="tab" href="#vehicle_details">Vehicle Details</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" data-toggle="tab" href="#finance_details">Finance Details</a>
				    </li> --}}
				    <li class="nav-item">
				      <a class="nav-link" data-toggle="tab" href="#guarantor_details">Guarantor Details</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" data-toggle="tab" href="#document_details">Document Details</a>
				    </li>
				</ul>
			</div>
			{{Form::open(array('route' => 'client.store', 'method' => 'post','enctype' => 'multipart/form-data'))}}
			<div class="card-body">	
				<div class="tab-content">
				    <div id="basic_details" class="container tab-pane active">
				    	<div class="row ">
				    		{{-- <div class="col-md-12 form-group">
				    			<input type="checkbox" name="login" value="1"> If You want to create client aaccount login and password
				    		</div> --}}
				    	   	<div class="col-md-6 form-group">
								{{Form::label('name','Full Name',['class'=>'required'])}}
								{{Form::input('text','name',old('name'),['class'=>'form-control','placeholder'=>'Client Name','required'=>'required'])}}
								@error('name')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('father_name','Father Name',['class'=>'required'])}}
								{{Form::input('text','father_name',old('father_name'),['class'=>'form-control','placeholder'=>'Father Name','required'=>'required'])}}
								@error('father_name')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('aadhar_card','Aadhar Card',['class'=>'required'])}}
								{{Form::input('text','aadhar_card',old('aadhar_card'),['class'=>'form-control','placeholder'=>'Enter Aadhar Card','required' => 'required','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
								@error('aadhar_card')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('email','Email Address')}}
								{{Form::input('email','email',old('email'),['class'=>'form-control','placeholder'=>'Client Email'])}}
								@error('email')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('mobile','Mobile Number',['class'=>'required'])}}<span class="text-muted">(Fill correct this is username of client)</span> 
								{{Form::input('text','mobile',old('mobile'),['class'=>'form-control','placeholder'=>'Mobile Number','required'=>'required','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
								@error('mobile')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('mobile1','Alternate Mobile Number')}}
								{{Form::input('text','mobile1',old('mobile1'),['class'=>'form-control','placeholder'=>'Alternate Mobile Number','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
								@error('mobile1')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('age','Age')}}
								{{Form::input('text','age',old('age'),['class'=>'form-control','placeholder'=>'Enter Age','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
								@error('age')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('cast_category','Cast')}}
								{{Form::select('cast_category',CAST,old('cast_category'),['class'=>'form-control','placeholder'=>'Select Cast'])}}
								@error('cast_category')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							
							<div class="col-md-6 form-group">
								{{Form::label('pan_card','PAN Card Number')}}
								{{Form::input('text','pan_card',old('pan_card'),['class'=>'form-control','placeholder'=>'Enter PAN Card Number'])}}
								@error('pan_card')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('address','Address',['class'=>'required'])}}
								{{Form::input('text','address',old('address'),['class'=>'form-control','placeholder'=>'Enter Address','required' => 'required'])}}
								@error('address')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('zip_code','Zip Code',['class'=>'required'])}}
								{{Form::input('text','zip_code',old('zip_code'),['class'=>'form-control','placeholder'=>'Enter Zip Code','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');",'required' => 'required'])}}
								@error('zip_code')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('bussiness','Bussiness Name')}}
								{{Form::input('text','bussiness',old('bussiness'),['class'=>'form-control','placeholder'=>'Bussiness Name'])}}
								@error('bussiness')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('bussiness_year','Bussiness Year')}}
								{{Form::input('text','bussiness_year',old('bussiness_year'),['class'=>'form-control','placeholder'=>'Bussiness Year'])}}
								@error('bussiness_year')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('office_name','Office Name')}}
								{{Form::input('text','office_name',old('office_name'),['class'=>'form-control','placeholder'=>'Office Year'])}}
								@error('office_name')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							
							<div class="col-md-6 form-group">
								{{Form::label('registration_date','Registration Date',['class' => 'required'])}}
								{{Form::input('text','registration_date',old('registration_date') ?? date('Y-m-d'),['class'=>'form-control datepicker','placeholder'=>'Registration Date','readonly' => 'readonly'])}}
								@error('registration_date')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>		

							<div class="col-md-6 form-group">
								{{Form::label('office_position','Office Position')}}
								{{Form::input('text','office_position',old('office_position'),['class'=>'form-control','placeholder'=>'Office Year'])}}
								@error('office_position')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('office_id_card','Office Id Card')}}
								{{Form::input('text','office_id_card',old('office_id_card'),['class'=>'form-control','placeholder'=>'Office Id Card'])}}
								@error('office_id_card')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('office_address','Office Address')}}
								{{Form::input('text','office_address',old('office_address'),['class'=>'form-control','placeholder'=>'Office Address'])}}
								@error('office_address')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('monthly_income','Monthly Income ')}}
								{{Form::input('text','monthly_income',old('monthly_income'),['class'=>'form-control','placeholder'=>'Monthly Income'])}}
								@error('monthly_income')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('any_income_source','Any Income Source Name')}}
								{{Form::input('text','any_income_source',old('any_income_source'),['class'=>'form-control','placeholder'=>'Any Income Source Name'])}}
								@error('any_income_source')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('bank_name','Bank Name')}}
								{{Form::input('text','bank_name',old('bank_name'),['class'=>'form-control','placeholder'=>'Bank Name'])}}
								@error('bank_name')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>	
				    		<div class="col-md-6 form-group">
								{{Form::label('file','Photo')}}
								{{Form::file('photo',['class' => 'form-control','accept'=>'image/*'])}}
								@error('photo')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('signature','Client Signature')}}
								{{Form::file('signature',['class'=>'form-control','accept'=>'image/*'])}}
								@error('signature')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
				    	</div>
				    </div>
				    {{-- <div id="vehicle_details" class="container tab-pane fade" >
				    	<div class="row">
							<div class="col-md-6 form-group">
								{{Form::label('vehicle_name','Vehicle Name',['class' => 'required'])}}
								{{Form::input('text','vehicle_name',old('vehicle_name'),['class'=>'form-control','placeholder'=>'Vehicle Name'])}}
								@error('vehicle_name')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('vehicle_model','Vehicle Model',['class' => 'required'])}}
								{{Form::input('text','vehicle_model',old('vehicle_model'),['class'=>'form-control','placeholder'=>'Vehicle Model'])}}
								@error('vehicle_model')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('vehicle_no','Vehicle Number')}}
								{{Form::input('text','vehicle_no',old('vehicle_no'),['class'=>'form-control','placeholder'=>'Vehicle Number'])}}
								@error('vehicle_no')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('vehicle_chassis_no','Vehicle Chassis Number',['class' => 'required'])}}
								{{Form::input('text','vehicle_chassis_no',old('vehicle_chassis_no'),['class'=>'form-control','placeholder'=>'Vehicle Chassis Number'])}}
								@error('vehicle_chassis_no')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('vehicle_engine_no','Vehicle Engine Number',['class' => 'required'])}}
								{{Form::input('text','vehicle_engine_no',old('vehicle_engine_no'),['class'=>'form-control','placeholder'=>'Vehicle Engine Number'])}}
								@error('vehicle_engine_no')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
						</div>
				    </div>
				     <div id="finance_details" class="container tab-pane fade" >
				     	<div class="row">
							<div class="col-md-6 form-group">
								{{Form::label('finance_amount','Finance Amount'),['class' => 'required']}}
								{{Form::input('text','finance_amount',old('finance_amount'),['class'=>'form-control','placeholder'=>'Finance Amount'])}}
								@error('finance_amount')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>	
							<div class="col-md-6 form-group">
								{{Form::label('agreement_date','Agreement Date')}}
								{{Form::input('text','agreement_date',old('agreement_date'),['class'=>'form-control datepicker','placeholder'=>'Agreement Date'])}}
								@error('agreement_date')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>		
							<div class="col-md-6 form-group">
								{{Form::label('no_of_instalments','Number of Instalment')}}
								{{Form::input('text','no_of_instalments',old('no_of_instalments'),['class'=>'form-control','placeholder'=>'Number of Instalment'])}}
								@error('no_of_instalments')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>		
						</div>
				    </div> --}}
				     <div id="guarantor_details" class="container tab-pane fade" >
				     	<div class="row">
							<div class="col-md-6 form-group">
								{{Form::label('guarantor_name','Guarantor Name')}}
								{{Form::input('text','guarantor_name',old('guarantor_name'),['class'=>'form-control','placeholder'=>'Guarantor Name'])}}
								@error('guarantor_name')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('guarantor_mobile','Guarantor Mobile')}}
								{{Form::input('text','guarantor_mobile',old('guarantor_mobile'),['class'=>'form-control','placeholder'=>'Guarantor Mobile','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
								@error('guarantor_mobile')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('guarantor_address','Guarantor Address')}}
								{{Form::input('text','guarantor_address',old('guarantor_address'),['class'=>'form-control','placeholder'=>'Guarantor Address'])}}
								@error('guarantor_address')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('guarantor_income','Guarantor Income')}}
								{{Form::input('text','guarantor_income',old('guarantor_income'),['class'=>'form-control','placeholder'=>'Guarantor Income'])}}
								@error('guarantor_income')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('guarantor_bussiness','Guarantor Bussiness')}}
								{{Form::input('text','guarantor_bussiness',old('guarantor_bussiness'),['class'=>'form-control','placeholder'=>'Guarantor Bussiness'])}}
								@error('guarantor_bussiness')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('guarantor_position','Guarantor Position')}}
								{{Form::input('text','guarantor_position',old('guarantor_position'),['class'=>'form-control','placeholder'=>'Guarantor Position'])}}
								@error('guarantor_position')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('guarantor_signature','Guarantor Signature')}}
								{{Form::file('guarantor_signature',['class'=>'form-control','accept'=>'image/*'])}}
								@error('guarantor_signature')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								{{Form::input('checkbox','guarantor_another',old('guarantor_another'))}}
								{{Form::label('Another Guarantor Details')}}
							</div>
						</div>
						<div class="row" style="display: none" id="guarantor_another_row">
							<div class="col-md-12 form-group">
								{{-- <h6>Another Guarantor Detail</h6> --}}
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('guarantor_name1','Guarantor Name')}}
								{{Form::input('text','guarantor_name1',old('guarantor_name1'),['class'=>'form-control','placeholder'=>'Guarantor Name'])}}
								@error('guarantor_name1')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('guarantor_mobile1','Guarantor Mobile')}}
								{{Form::input('text','guarantor_mobile1',old('guarantor_mobile1'),['class'=>'form-control','placeholder'=>'Guarantor Mobile','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
								@error('guarantor_mobile1')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('guarantor_address1','Guarantor Address')}}
								{{Form::input('text','guarantor_address1',old('guarantor_address1'),['class'=>'form-control','placeholder'=>'Guarantor Address'])}}
								@error('guarantor_address1')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('guarantor_income1','Guarantor Income')}}
								{{Form::input('text','guarantor_income1',old('guarantor_income1'),['class'=>'form-control','placeholder'=>'Guarantor Income'])}}
								@error('guarantor_income1')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('guarantor_bussiness1','Guarantor Bussiness')}}
								{{Form::input('text','guarantor_bussiness1',old('guarantor_bussiness1'),['class'=>'form-control','placeholder'=>'Guarantor Bussiness'])}}
								@error('guarantor_bussiness1')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('guarantor_position1','Guarantor Position')}}
								{{Form::input('text','guarantor_position1',old('guarantor_position1'),['class'=>'form-control','placeholder'=>'Guarantor Position'])}}
								@error('guarantor_position1')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
							<div class="col-md-6 form-group">
								{{Form::label('guarantor_signature1','Guarantor Signature')}}
								{{Form::file('guarantor_signature1',['class'=>'form-control','accept'=>'image/*'])}}
								@error('guarantor_signature1')
							        <span class="text-danger" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>
						</div>
				    </div>
				     <div id="document_details" class="container tab-pane fade" >
				     	<div class="row">
				     		<div class="col-md-12">
				     			<table class="table table-striped">
				     				<thead>
				     					<th>Document Name</th>
				     					<th>Document Upload 
				     						{{-- <button><i class="fa fa-plus"><i></button> --}}
				     					</th>
				     				</thead>
				     				<tbody id="tbody">
				     					<tr id="row0">
				     					{{-- 	<td>
				     							<input type="text" name="doc_name[]" value="" class="form-control">
				     						</td>
				     						<td>
				     							<input type="file" name="doc_file[]" class="form-control">
				     						</td>
				     					</tr>
				     					<tr id="row0">
				     						<td>
				     							<input type="text" name="doc_name[]" value="" class="form-control">
				     						</td>
				     						<td>
				     							<input type="file" name="doc_file[]" class="form-control">
				     						</td>
				     					</tr>
				     					<tr id="row0">
				     						<td>
				     							<input type="text" name="doc_name[]" value="" class="form-control">
				     						</td>
				     						<td>
				     							<input type="file" name="doc_file[]" class="form-control">
				     						</td>
				     					</tr>
				     					<tr id="row0">
				     						<td>
				     							<input type="text" name="doc_name[]" value="" class="form-control">
				     						</td>
				     						<td>
				     							<input type="file" name="doc_file[]" class="form-control">
				     						</td>
				     					</tr>
				     					<tr id="row0">
				     						<td>
				     							<input type="text" name="doc_name[]" value="" class="form-control">
				     						</td>
				     						<td>
				     							<input type="file" name="doc_file[]" class="form-control">
				     						</td> --}}
				     					</tr>
				     				</tbody>
				     			</table>
				     		</div>
				     	</div>
				    </div>
				</div>
			</div>
			<div class="card-footer">
				{{Form::submit('Save & Continue')}}

			</div>
			{{Form::close()}}
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
	    // $('#tags').select2();
	    $('.required').append('<span class="text-danger"><b> * </b></span>');
	 //    $('.title').blur(function(e){
		// 	var Text = $(this).val();
		// 	Text = Text.toLowerCase();
		// 	Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
		// 	$(".sefriendly").val(Text); 
		// });
	    
	    $('input[name="guarantor_another"]').on('change',function(e){
			e.preventDefault();
			if($(this).is(":checked")) {
	            $('#guarantor_another_row').show();
	        }else{
	            $('#guarantor_another_row').hide();
	        }
			
		});

	    $(function() {
			$('.datepicker').datepicker({
				format:'yyyy-mm-dd'
			});
		});
	
   	});
</script>
@endsection