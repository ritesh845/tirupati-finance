@extends('backend.layouts.main')
@section('page_name','Finance Amount')
@section('content')	
<div class="row">
	<div class="col-md-12">
		<div class="card border-top-primary">
			<div class="card-header ">Finance Amount List (0)
				<a href="{{route('finance.create')}}" class="pull-right btn btn-sm btn-primary"><i class="fa fa-plus "></i> Add New</a>
			</div>
			<div class="card-body">
				<div class="col-md-4 form-group">
					{{Form::label('Filter')}}
					{{Form::select('vehicle_type',VEHICLETYPE,'1',['class'=>'form-control','placeholder'=>'Select Vehicle Type'])}}
				</div>
				<table class="table table-bordered table-striped datatable">
					<thead>
						<tr>
							<th>#</th>
							<th>Finance Amount</th>
							<th>Total Amount</th>
							<th>No of Instalment</th>
							{{-- <th>Interest</th> --}}
							<th>Vehicle Type</th>
							<th>Status</th>
							<th>Created Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php $count = 1;@endphp
						@foreach($loans as $loan)
						<tr>
							<td>{{$count++}}</td>
							<td>{{$loan->finance_amount}}</td>
							<td>{{$loan->total_amount}}</td>
							<td>{{$loan->no_of_instalment}}</td>
							{{-- <td>{{$loan->interest}} paisa %</td> --}}
							<td>{{Arr::get(VEHICLETYPE,$loan->vehicle_type)}}</td>
							<td>{{$loan->status == '1' ? 'Active' : 'Not Active'}}</td>
							<td>{{date('d-m-Y',strtotime($loan->created_at))}}</td>
							<td>
								<a href="{{route('finance.edit',$loan->id)}}" ><i class="btn fa fa-edit text-success"></i></a>
								<a href="{{route('finance.show',$loan->id)}}" ><i class="btn fa fa-eye text-primary"></i></a>

							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
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