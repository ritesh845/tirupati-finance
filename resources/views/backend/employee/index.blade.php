@extends('backend.layouts.main')
@section('page_name','Employee')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card border-top-primary">
			<div class="card-header ">Employee({{count($employees)}})
				<a href="{{route('employee.create')}}" class="btn btn-sm btn-primary pull-right ml-2"><i class="fa fa-plus"></i> Add New</a>	
			</div>
			<div class="card-body">
				<table class="table table-striped table-borderd datatable">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Mobile</th>
							<th>Email</th>
							<th>Aadhar Card</th>
							<th>Pan Card</th>
							<th>Address</th>
							{{-- <th>Registration Date</th> --}}
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php $count =1; @endphp
						@foreach($employees as $employee)
						<tr>
							<td>{{$count++}}</td>
							<td>{{$employee->name}}</td>
							<td>{{$employee->mobile}}</td>
							<td>{{$employee->email}}</td>
							<td>{{$employee->aadhar_card}}</td>
							<td>{{$employee->pan_card}}</td>
							<td>{{$employee->address}}</td>
							<td>
								<a href="{{route('employee.edit',$employee->id)}}"><i class="btn btn-sm btn-success fa fa-edit"> Edit</i></a>
								{{-- <a href="" class="btn btn-sm btn-primary">Permission</i></a> --}}
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
		});
		@if($message = Session::get('success'))
			$.notify("{{$message}}",'success');
		@endif
	})
</script>
@endsection