@extends('backend.layouts.main')
@section('page_name','Message')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card border-top-primary">
			<div class="card-header ">Message(0)
				<a href="{{route('message.create')}}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-envelope"></i> Compose Message</a>
			</div>
			<div class="card-body">
				<table class="table table-striped table-borderd datatable">
					<thead>
						<tr>
							<th>#</th>
							<th>Mobile</th>
							<th>Message</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach($messages as $message)
							<tr>
								<td>{{$message->id}}</td>
								<td>{{$message->mobile}}</td>
								<td>{{$message->message}}</td>
								<td>{{$message->status == 0 ? 'Sent' : 'Failed'}}</td>
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