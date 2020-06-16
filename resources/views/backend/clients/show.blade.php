@extends('backend.layouts.main')
@section('page_name','Clients')
@section('content')
<div class="row">	
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<a href="{{route('client.index')}}" class="btn btn-sm btn-primary pull-right ml-2"><i class="fa fa-angle-left"></i> Back</a>	

				Client Detail
				{{-- <a href="" class="btn btn-sm btn-primary pull-right ml-2">SEIZING</a>
				<a href="{{route('client.noc',$client->id)}}" class="btn btn-sm btn-primary pull-right ml-2">NOC Report</a>	 --}}
				

			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-3">
						@if($client->photo !=null)
							<img src="{{asset('storage/'.$client->photo)}}" style="width: 100% ; height: 200px">
						@else
						<img src="{{asset('images/default.png')}}" style="width:100% ; height: 200px">
						@endif
						<br>
						<br>
						<hr>
						<h5>Signature</h5>
						@if($client->signature)
							<img src="{{asset('storage/'.$client->signature)}}" style="width: 100% ; height: 100px">
						@else
							<img src="{{asset('images/default.png')}}" style="width:100% ; height: 100px">
							
						@endif
					</div>
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-6">
								<h6>Name :- {{$client->name}}</h6>
								<h6>Mobile Number :- {{$client->mobile}}</h6>
								@if($client->mobile1 !=null)
									<h6>Alternate Mobile Number :- {{$client->mobile}}</h6>
								@endif
								<h6>Father Name:- {{$client->father_name}}</h6>
							</div>
							<div class="col-md-6">
								<h6>Aadhar Card :- {{$client->aadhar_card}}</h6>
								<h6>Pan Card :- {{$client->pan_card}}</h6>
								<h6>Email :- {{$client->email}}</h6>
								@if($client->email1 !=null)
								<h6>Email :- {{$client->email}}</h6>
								@endif

							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<h6>Age :- {{$client->age}} </h6>
								<h6>Cast :- {{$client->cast_category !=null ? Arr::get(CAST,'1') :'' }} </h6>
								<h6>Bank Name :- {{$client->bank_name}}</h6>
							</div>
							<div class="col-md-6">
								<h6>Address :- {{$client->address}} </h6>
								<h6>Zip Code :- {{$client->zip_code}} </h6>
							</div>
						</div>

						<hr>

						<div class="row">
							<div class="col-md-6">
								<h6>Bussiness Name :- {{$client->bussiness}}</h6>		
								<h6>Bussiness Year :- {{$client->bussiness_yea}}</h6>		
								<h6>Monthly Income :- {{$client->monthly_income}}</h6>		
								<h6>Any Income Source :- {{$client->any_income_source}}</h6>	
							</div>
							<div class="col-md-6">
								<h6>Office Name :- {{$client->office_name}}</h6>
								<h6>Office Position :- {{$client->office_position}}</h6>
								<h6>Office Id Card :- {{$client->office_id_card}}</h6>
								<h6>Office Address :- {{$client->office_address}}</h6>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<h5>Guarantor Details:</h5>
								<br>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<h6> Guarantor Name :- {{$client->guarantor_name}} </h6>
								<h6> Guarantor Mobile :- {{$client->guarantor_mobile}} </h6>
								<h6> Guarantor Address :- {{$client->guarantor_address}} </h6>
							</div>
							<div class="col-md-6">
								<h6> Guarantor Income :- {{$client->guarantor_income}} </h6>
								<h6> Guarantor Business :- {{$client->guarantor_bussiness}} </h6>
								<h6> Guarantor Position :- {{$client->guarantor_position}} </h6>
							</div>
						</div>
						
						<div class="row" style="display: none;" id="guarantor_another">
							<div class="col-md-6">
								<h6> Guarantor Name :- {{$client->guarantor_name1}} </h6>
								<h6> Guarantor Mobile :- {{$client->guarantor_mobile1}} </h6>
								<h6> Guarantor Address :- {{$client->guarantor_address1}} </h6>
							</div>
							<div class="col-md-6">
								<h6> Guarantor Income :- {{$client->guarantor_income1}} </h6>
								<h6> Guarantor Business :- {{$client->guarantor_bussiness1}} </h6>
								<h6> Guarantor Position :- {{$client->guarantor_position1}} </h6>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<h4>Loan Detail  <a href="{{route('loan.create',$client->id)}}" class="btn btn-sm btn-primary pull-right ml-2">New Loan</a></h4>
					</div>
					<div class="col-md-12 mt-4">
						<table class="table table-striped table-borderd datatable">
							<thead>
								<tr>
									<th>#</th>
									<th>Financer Name</th>
									<th>Vehicle Type</th>
									<th>Vehicle Name</th>
									<th>Vehicle Model</th>
									<th>Vehicle Number</th>
									<th>No. of Instalment</th>
									<th>Finance Amount</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php  $count = 1 ;@endphp
								@foreach($clientLoans as $clientLoan)
								<tr>
									<td>{{$count++}}</td>
									<td>{{$clientLoan->financer_name}}</td>
									<td>{{Arr::get(VEHICLETYPE,$clientLoan->vehicle_type)}}</td>
									<td>{{$clientLoan->vehicle_name}}</td>
									<td>{{$clientLoan->vehicle_model}}</td>
									<td>{{$clientLoan->vehicle_number !='' ? $clientLoan->vehicle_number : '-'}}</td>
									<td>{{$clientLoan->loan_mast->no_of_instalment}}</td>
									<td>{{$clientLoan->finance_amount}}</td>
									<td>{{Arr::get(LOANSTATUS,$clientLoan->status)}}</td>
									<td>
										<a href="{{route('loan.edit',$clientLoan->id)}}" ><i class="btn fa fa-edit text-success"></i></a>
										<a href="{{route('loan.show',$clientLoan->id)}}" ><i class="btn fa fa-eye text-primary"></i></a>
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
<script >
	$(document).ready(function(){
		@if($client->guarantor_another ==1)
			$('#guarantor_another').show();
		@endif
		$(function(){
			$('.datatable').DataTable();
		});
	})
</script>
@endsection