@extends('backend.layouts.main')
@section('page_name','Client Loan')
@section('content')
<div class="row">	
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				Loan Details
				@role('admin|Employee')
				<a href="{{route('client.show',$clientLoan->id)}}" class="btn btn-sm btn-primary pull-right ml-2"><i class="fa fa-angle-left"></i> Back</a>	
				<a href="" class="btn btn-sm btn-primary pull-right ml-2">SEIZING</a>
				<a href="{{route('loan.noc',$clientLoan->id)}}" class="btn btn-sm btn-primary pull-right ml-2">NOC Report</a>
				@endrole
				@role('client')
					<a href="{{route('loan.index')}}" class="btn btn-sm btn-primary pull-right ml-2"><i class="fa fa-angle-left"></i> Back</a>	
				@endrole	
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6 form-group">
						<h6>Financer Name :- {{$clientLoan->financer_name}}</h6>
						<h6>Hirer Name :- {{$clientLoan->hirer_name}}</h6>
						<h6>Make :- {{$clientLoan->make}}</h6>
					</div>
					<div class="col-md-6 form-group">
						
						<h6>Finance Amount :- {{$clientLoan->finance_amount}}</h6>
						<h6>No of Instalments :- {{$clientLoan->loan_mast->no_of_instalment}}</h6>
						<h6>Status :- {{Arr::get(LOANSTATUS,$clientLoan->status)}}</h6>
						
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6 form-group">
						<h6>Vehicle Type :- {{Arr::get(VEHICLETYPE,$clientLoan->vehicle_type)}}</h6>
						<h6>Vehicle Name :- {{$clientLoan->vehicle_name}}</h6>
						<h6>Vehicle Number :- {{$clientLoan->number}}</h6>
					</div>
					<div class="col-md-6 form-group">
						<h6>Vehicle Model :- {{$clientLoan->vehicle_model}}</h6>
						<h6>Vehicle Chassis No. :- {{$clientLoan->vehicle_chassis_no}}</h6>
						<h6>Vehicle Engine No. :- {{$clientLoan->vehicle_engine_no}}</h6>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12 form-group">
						<h5>Loan Instalment :</h5>
					</div>
					<div class="col-md-12">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Premium Amount</th>
									<th>Premium Amount Paid</th>
									<th>Instalment Date</th>
									<th>Late Days</th>
									<th>Instalment Pay</th>
									{{-- <th>Instalment Status</th> --}}
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php $count = 1; @endphp
								@foreach($clientLoan->instalments as $instalment)
									<tr>
										<td>{{$count++}}</td>
										<td>{{$instalment->amount}}</td>
										<td>{{$instalment->amount_due != null ? $instalment->amount_due : '0' }}</td>
										<td>{{date('d-m-Y',strtotime($instalment->instalment_date))}}</td>
										<td>{{$instalment->late_days}}</td>
										<td>{{Arr::get(PAYSTATUS,$instalment->pay)}}</td>
										{{-- <td>{{Arr::get(LOANSTATUS,$instalment->status)}}</td> --}}
										<td>
											@if($instalment->pay == 0)
												{{-- @if($instalment->after == 0) --}}
													<a href="{{route('payment.show',$instalment->id)}}" class="btn btn-sm btn-success">Paytm</a>
												@role('admin')
													<button type="button" class="btn btn-primary" id="modelId" data-id="{{$instalment->id}}">Paid</button>
												@endrole

												{{-- @else
													<span class="text-danger">Upto Instalment not paid</span>
												@endif --}}
											@elseif($instalment->pay == 2)
												After apporval reciept generate
											@else
												<a href="{{route('instalment.reciept',$instalment->id)}}" class="btn btn-sm btn-primary">Reciept Generate</a>
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Instalment Pay</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	{{Form::open(array('route' => 'instalment.pay' , 'method' => 'post'))}}
        <div class="row">
        	<div class="col-md-12 form-group">
				{{Form::label('name','Full Name',['class'=>'required'])}}
				{{Form::input('text','name','',['class'=>'form-control','placeholder'=>'Client Name','required'=>'required'])}}
			</div>
			
			<div class="col-md-12 form-group">
				{{Form::label('mobile','Mobile Number',['class'=>'required'])}}
				{{Form::input('text','mobile','',['class'=>'form-control','placeholder'=>'Mobile Number','required'=>'required','oninput' =>"this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"])}}
			</div>
			<div class="col-md-12 form-group">
				{{Form::label('address','Address',['class'=>'required'])}}
				{{Form::input('text','address','',['class'=>'form-control','placeholder'=>'Enter Address'])}}
			</div>
        	<div class="col-md-12 form-group">
        		{{Form::label('amount',"Total Amount")}} <span class="text-muted">(premium amount + late amount) </span>
        		{{Form::input('text','amount','',['class' => 'form-control','readonly'=>'readonly'])}}
        	</div>
        	<div class="col-md-12 form-group">
        		{{Form::label('payment_mode',"Payment Mode")}}
        		{{Form::select('payment_mode',PAYMENTMODE,'',['class' => 'form-control'])}}
        	</div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{Form::hidden('instalment_id',$instalment->id)}}
        {{Form::submit('Pay' , ['class' => 'btn btn-sm btn-success'])}}
      </div>
      {{Form::close()}}
    </div>
  </div>
</div>
<script >
	$(document).ready(function(){
		@if($message = Session::get('success'))
			$.notify("{{$message}}",'success')
		@endif

		$('#modelId').on('click',function(e){
			e.preventDefault();
			var id = $(this).attr('data-id');
			$.ajax({
				type:'post',
				url:'{{route('instalment.fetch')}}',
				data:{id:id},
				success:function(res){
					console.log(res)
					$('input[name="name"]').val(res.client.name);
					$('input[name="mobile"]').val(res.client.mobile);
					$('input[name="address"]').val(res.client.address);
					$('input[name="amount"]').val(parseInt(res.amount)+parseInt(res.late_amount));
					$('input[name="instalment_id"]').val(res.id);
					$('#exampleModal').modal('show');
				}
			});
		});

	})
</script>
@endsection