@extends('backend.layouts.main')
@section('page_name','Clients')
@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="card border-top-primary">
				<div class="card-header ">Clients ({{count($clients)}})
					<a href="{{route('client.create')}}" class="pull-right btn btn-sm btn-primary"><i class="fa fa-plus "></i> Add New</a>
				</div>
				<div class="card-body">
					{{-- <div class="row">
						<h6>Filter</h6>
						<div class="col-md-3 form-group">
							<input type="text" name="name" class="form-control" value="" placeholder="client name">
						</div>
						<div class="col-md-3 form-group">
							<input type="text" name="name" class="form-control" value="" placeholder="aadhar number" >
						</div>
						<div class="col-md-3 form-group">
							
							<button class="btn btn-sm btn-primary" >Search</button>
							
						</div> --}}
					{{-- </div> --}}
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped table-borderd datatable">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Mobile</th>
										<th>Aadhar Card</th>
										<th>Agreement Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($clients as $client)
										<tr>
											<td>{{$client->id}}</td>
											<td>{{$client->name}}</td>
											<td>{{$client->mobile}}</td>
											<td>{{$client->aadhar_card}}</td>
											<td>{{$client->agreement_date}}</td>
											<td>
												<a href="{{route('client.edit',$client->id)}}"><i class="btn text-success fa fa-edit"></i></a>
												<a href="{{route('client.show',$client->id)}}">
													<i class="btn text-primary fa fa-eye"></i>
												</a>
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
<script>
	$(document).ready(function(){
		$(function(){
			$('.datatable').DataTable();
		})
	})
</script>
@endsection