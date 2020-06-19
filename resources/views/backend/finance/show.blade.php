@extends('backend.layouts.main')
@section('page_name','Finance Amount')
@section('content')	
<div class="row">
	<div class="col-md-12">
		<div class="card border-top-primary">
			<div class="card-header ">Finance Amount Details
				<a href="{{route('finance.index')}}" class="btn btn-sm btn-primary pull-right ml-2"><i class="fa fa-angle-left"></i> Back</a>	
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6 form-group">
						<h6>Vehicle Type: {{Arr::get(VEHICLETYPE,$loan->vehicle_type)}}</h6>
						<h6>Finance Amount: {{$loan->finance_amount}}</h6>
					</div>
					<div class="col-md-6 form-group">
						<h6>Interest: {{Arr::get(INTEREST,$loan->vehicle_type)}}</h6>
						<h6>No. of Instalment: {{$loan->no_of_instalment}}</h6>
					</div>

					<hr>
					<div class="col-md-12 form-group">
						<h5>Instalment Amount List :- </h5>
						<br>
						<table class="table table-striped table-bordered datatable">
							<thead>
								<tr>
									<th>#</th>
									<th>Premium Amount</th>
								</tr>
							</thead>
							<tbody>
								@php $count =1; @endphp
								@foreach($loan->instalments as $instalment)
								<tr>
									<td>{{$count++}}</td>
									<td>{{$instalment->premium}}</td>
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
<script>
	$(document).ready(function(){
		$(function(){
			$('.datatable').DataTable();
		})
	})
</script>
@endsection