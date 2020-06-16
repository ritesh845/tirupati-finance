@extends('backend.layouts.main')
@section('page_name','Client Loan')
@section('content')
<div class="row">	
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				Loan Details
				<a href="{{route('client.show',$clientLoan->id)}}" class="btn btn-sm btn-primary pull-right ml-2"><i class="fa fa-angle-left"></i> Back</a>	
				<a href="" class="btn btn-sm btn-primary pull-right ml-2">SEIZING</a>
				<a href="{{route('client.noc',$clientLoan->id)}}" class="btn btn-sm btn-primary pull-right ml-2">NOC Report</a>	
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
									<th>Instalment Status</th>
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
										<td>{{Arr::get(LOANSTATUS,$instalment->status)}}</td>
										<td>
											@if($instalment->pay == 0)
												{{-- @if($instalment->after == 0) --}}
													<a href="{{route('payment.show',$instalment->id)}}" class="btn btn-sm btn-success">Pay Premium</a>

												{{-- @else
													<span class="text-danger">Upto Instalment not paid</span>
												@endif --}}
											@else
												Already Paid
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
@endsection