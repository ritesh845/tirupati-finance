@extends('backend.layouts.main')
@section('page_name','Contact')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card border-top-primary">
			<div class="card-header ">Contact</div>
			<div class="card-body">
				<table class="table table-striped table-bordered datatable">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Mobile</th>
							<th>Subject</th>
							<th>Message</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php $count = 1; @endphp
						@foreach($contacts as $contact)
						<tr>
							<th>{{$count++}}</th>
							<th>{{$contact->name}}</th>
							<th>{{$contact->mobile}}</th>
							<th>{{$contact->subject}}</th>
							<th>{{$contact->message}}</th>
							<th>
								<a href="{{route('contact.delete',$contact->id)}}" class="btn"><i class="fa fa-trash text-danger"></i></a>
								
							</th>
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
		@if($message = Session::get('success'))
			$.notify("{{$message}}",'success')
		@endif
	})
</script>
@endsection