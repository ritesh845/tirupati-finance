@extends('backend.layouts.main')
@section('page_name','Finance Amount')
@section('content')	
<div class="row">
	<div class="col-md-12">
		<div class="card border-top-primary">
			<div class="card-header ">Create New
				<a href="{{route('finance.index')}}" class="btn btn-sm btn-primary pull-right ml-2"><i class="fa fa-angle-left"></i> Back</a>	
			</div>
			<div class="card-body">
				{{-- {{Form::open(array('route' => 'finance.store','method'=>'post', 'id' => 'my-form'))}}
				@csrf --}}
				<div class="row">
					<div class="col-md-6 form-group">
						{{Form::label('vehicle_type','Vehicle Type'),['class' => 'required']}}
						{{Form::select('vehicle_type',VEHICLETYPE,old('vehicle_type') ?? $loan->vehicle_type,['class'=>'form-control','placeholder'=>'Select Vehicle Type'])}}
						@error('vehicle_type')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('interest','Interest'),['class' => 'required']}}
						{{Form::input('text','interest',old('interest') ?? (Arr::get(INTEREST,$loan->vehicle_type)),['class'=>'form-control','placeholder'=>'','readonly' => 'readonly'])}}
						@error('interest')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('finance_amount','Finance Amount',['class' => 'required'])}}
						{{Form::input('text','finance_amount',old('finance_amount') ?? $loan->finance_amount,['class' => 'form-control','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
						@error('finance_amount')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-6 form-group">
						{{Form::label('total_amount','Total Amount',['class' => 'required'])}}
						{{Form::input('text','total_amount',old('total_amount') ?? $loan->total_amount,['class' => 'form-control','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
						@error('total_amount')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>

					<div class="col-md-6 form-group">
						{{Form::label('no_of_instalment','Number Of Instalment',['class' => 'required'])}}
						{{Form::input('text','no_of_instalment',old('no_of_instalment') ?? $loan->no_of_instalment,['class' => 'form-control','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
						@error('no_of_instalment')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<button class="btn btn-sm btn-primary" id="generate">
							Generate Instalment
						</button>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<h5>Instalment List: </h5>
					</div>
					<div class="col-md-12 form-group" >
						 <table class="table table-striped table-bordered">
						 	<thead>
						 		<tr>
						 			<th>#</th>
						 			<th>Premium Amount</th>
						 			{{-- <th>Instalment Day</th> --}}
						 		</tr>
						 	</thead>
						 	<tbody id="tbody">
						 		
						 	</tbody>
						 </table>
					</div>
				</div>
			</div>
			<div class="card-footer">
				{{Form::submit('submit', ['class' => 'btn btn-sm btn-success','id' => 'formSubmit'])}}
			</div>
			{{-- {{Form::close()}} --}}
		</div>
	</div>
</div>
<script >
	$(document).ready(function(){
		$('select[name="vehicle_type"]').on('change',function(e){
			// console.log("hello")
			e.preventDefault();

			var type = $(this).val();
			// console.log(type);
			if(type == 1){
				percent = {{Arr::get(INTEREST,'1')}};
			}else{
				percent = {{Arr::get(INTEREST,'2')}};
			}
			$('input[name="interest"]').val(percent);
		});

		$('#generate').on('click',function(e){
			e.preventDefault();
			var no_of_instalment = $('input[name="no_of_instalment"]').val();
			var finance_amount = $('input[name="finance_amount"]').val();
			generate_instalment(no_of_instalment,finance_amount);
		});
		
		// var finance_amount= "{{$loan->finance_amount}}";
		{{-- var no_of_instalment = "{{count($loan->instalments)}}"; --}}
		@if(count($loan->instalments) !=0)
			generate_instalment();
		@endif
			function generate_instalment(){
				$('#tbody').empty();
				@php $count =1;  @endphp
				@foreach($loan->instalments as $instalment)

					$('#tbody').append('<tr><td>{{$count++}}</td><td>{{Form::input('text','premium[]',$instalment->premium,['class'=>'form-control premium','required' => 'required'])}}</td></tr>');


				@endforeach
			}
		// $(function() {
		// 	$('.datepicker').datepicker({
		// 		format:'yyyy-mm-dd'
		// 	});
		// });
		$(document).on("focus", ".datepicker", function () {
		    $(".datepicker").datepicker({
		    	format:'yyyy-mm-dd'
		    });
		});

		$(document).on('keyup','.premium',function(){
			if(!$.isNumeric($(this).val())){
				$.notify('premium amount field is digit format');
				$(this).css('border-color','red')
			}else{
				$(this).css('border-color','green')
			}
		});

		// $(document).on('keyup','.instalment_day',function(){
		// 	if(!$.isNumeric($(this).val())){
		// 		$.notify('instalment day field is digit format');
		// 		$(this).css('border-color','red')
		// 	}else{
		// 		$(this).css('border-color','green')
		// 	}
		// });
		// $("#my-form").validate({
		//   submitHandler: function(form) {
		//     form.submit();
		//   },
		//   ignore: [],
		//   rules: {
		//     'premium[]': {
		//       required: true
		//     },
		//     'instalment_date[]':{
		//     	required:true
		//     }
		//   }
		// });

		$('#formSubmit').on('click',function(e){
			e.preventDefault();
			var vehicle_type = $('select[name="vehicle_type"]').val();
			var interest = $('input[name="interest"]').val();
			var finance_amount = $('input[name="finance_amount"]').val();
			var total_amount = $('input[name="total_amount"]').val();

			var no_of_instalment = $('input[name="no_of_instalment"]').val();
			

			var premium = $('input[name="premium[]"]').map(function () {
			    return this.value; // $(this).val()
			}).get();

			// var instalment_day = $('input[name="instalment_day[]"]').map(function () {
			//     return this.value; // $(this).val()
			// }).get();
		
			var premium_total_amount = 0;
			if(premium.length !=0 && finance_amount !=0 && vehicle_type != '' && no_of_instalment !='' && total_amount != 0){
				if(premium.length == no_of_instalment){
					if(premium_amount_digit(premium)){
						// if(instalment_day_digit(instalment_day)){
							for (var i = 0; i < premium.length; i++) {
								premium_total_amount += premium[i] << 0;
							}	
							if(total_amount == premium_total_amount){
								$.ajax({
									type:'patch',
									url : "{{route('finance.update',$loan->id)}}",
									data: {total_amount:total_amount,finance_amount:finance_amount,interest:interest,vehicle_type:vehicle_type,no_of_instalment:no_of_instalment,premium:premium},
									success:function(res){
										if(res =='Success'){
											$.notify('Finance Amount Successfully Updated','success');
											window.setTimeout(
											  function(){
											    location.reload(true)
											  },
											  3000
											);
										}
									}


								});

							}else{
								$.notify('Total Amount and Premium Amount are not same your premium total is : '+premium_total_amount);
							}
						// }else{
						// 	$.notify('all instalment day field must be digit format');
						// }					
					}else{
						$.notify('all premium amount field must be digit format');
					}
				}	
				else{
					$.notify('instalment list and no of instalment not match');
				}
			}else{
				$.notify('All Field are mandatory');
			}

		});

		function premium_amount_digit(premium){
			for (var i = 0; i < premium.length; i++) {
				if(!$.isNumeric(premium[i])){
					return false;
				}
			}
			return true;
		}

		// function instalment_day_digit(instalment_day){
		// 	for (var i = 0; i < instalment_day.length; i++) {
		// 		if(!$.isNumeric(instalment_day[i])){
		// 			return false;
		// 		}
		// 	}
		// 	return true;
		// }


		// function instalment_date_check(instalment_date){
		// 	for(var j = 0; j < instalment_date.length; j++){
		// 		if(instalment_date[j] ==''){
		// 			return false;
		// 		}
		// 		return true;
		// 	}
		// }
		// function instalment_date_greater_than(instalment_date){

		// 	var tempDate = instalment_date[1].split('-'); 
		// 	var tempMonth = tempDate[1];
		// 	for(var j = 0; j < instalment_date.length; j++){
		// 		var date = instalment_date[j].split('-'),
		// 			month = date[1];
		// 			if(tempMonth > month){
		// 				 return false
		// 			}
		// 			// return true;
		// 			console.log(month);
		// 			console.log(tempMonth);
		// 			tempMonth = month;
		// 			// console.log(tempMonth);
				
		// 	}


		// }
	});
</script>
@endsection