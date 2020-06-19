@extends('backend.layouts.main')
@section('page_name','Loans')
@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="card border-top-primary">
				<div class="card-header ">Loans ({{count($loans)}})
				</div>
				<div class="card-body">
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
								<th>Total Amount</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@php  $count = 1 ;@endphp
							@foreach($loans as $clientLoan)
							<tr>
								<td>{{$count++}}</td>
								<td>{{$clientLoan->financer_name}}</td>
								<td>{{Arr::get(VEHICLETYPE,$clientLoan->vehicle_type)}}</td>
								<td>{{$clientLoan->vehicle_name}}</td>
								<td>{{$clientLoan->vehicle_model}}</td>
								<td>{{$clientLoan->vehicle_number !='' ? $clientLoan->vehicle_number : '-'}}</td>
								<td>{{$clientLoan->loan_mast->no_of_instalment}}</td>
								<td>{{$clientLoan->finance_amount}}</td>
								<td>{{$clientLoan->total_amount}}</td>
								<td>{{Arr::get(LOANSTATUS,$clientLoan->status)}}</td>
								<td>
									{{-- <a href="{{route('loan.edit',$clientLoan->id)}}" ><i class="btn fa fa-edit text-success"></i></a> --}}
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
<script >
	$(document).ready(function(){
		
		$(function(){
			$('.datatable').DataTable();
		});
	})
</script>
@endsection