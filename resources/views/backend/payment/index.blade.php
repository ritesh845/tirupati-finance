@extends('backend.layouts.main')
@section('page_name','Payment Details')
@section('content')
<div class="row">	
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				Payment	Details			
			</div>
			<div class="card-body">
				{{-- <div class="row">
					<div class="col-md-3 form-group">
						{{Form::label('txn_id','Transaction ID')}}
						{{Form::input('text','txn_id','',['class' => 'form-control'])}}	
					</div>
					<div class="col-md-3 form-group">
						{{Form::label('status','Status')}}
						{{Form::select('status',PAYMENTSTATUS,'2',['class' => 'form-control'])}}
					</div>
					<div class="col-md-3 form-group">
						{{Form::label('start_date','Start Date')}}
						{{Form::input('text','start_date','',['class' => 'form-control datepicker', 'readonly' => 'readonly'])}}	
					</div>
					<div class="col-md-3 form-group">
						{{Form::label('end_date','End Date')}}
						{{Form::input('text','end_date','',['class' => 'form-control datepicker', 'readonly' => 'readonly'])}}	
					</div>
					<div class="col-md-12 form-group">
						{{Form::submit('Filter',['class' => 'btn btn-sm btn-primary btnFilter'])}}
					</div>

				</div>
 --}}				<hr>
				<div class="row">
					<div class="col-md-12 table-responsive">
						<table class="table-striped table-bordered table datatable">
							<thead>
								<tr>
									<th>#</th>
									<th>Client Name</th>
									<th>Transaction ID</th>
									{{-- <th>Late Days</th> --}}
									<th>Instalment Amount</th>
									{{-- <th>Late Amount</th> --}}
									{{-- <th>Total Amount</th> --}}
									<th>Payment Mode</th>
									<th>Status</th>
									<th>Payment Date</th>
									{{-- <th>Reciept Admin</th> --}}
								</tr>
							</thead>
							<tbody>
								@php  $count =1; @endphp
								@foreach($payments as $payment)
									<tr>
										<td>{{$count++}}</td>
										<td>{{$payment->instalment->client->name}}</td>
										<td>{{$payment->order_id}}</td>
										{{-- <td>{{$payment->instalment->late_days}}</td> --}}
										<td>{{$payment->instalment->amount}}</td>
										{{-- <td>{{$payment->instalment->late_amount}}</td> --}}
										{{-- <td>{{$payment->amount}}</td> --}}
										{{-- <td>{{$payment->amount}}</td> --}}
										<td>{{Arr::get(PAYMENTMODE,$payment->payment_mode)}}</td>
										<td>{{Arr::get(PAYMENTSTATUS,$payment->status)}}</td>
										<td>{{date('d-m-Y',strtotime($payment->created_at))}}</td>
										{{-- <td>
											<a href=""> </a>
										</td> --}}
										{{-- <td>{{$payment->instalment->pay !=2 ? "Approve" : 'Not Approve'}}</td> --}}
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
		
		$(function(){
			$('.datatable').DataTable();
		});
	});
</script>
@endsection