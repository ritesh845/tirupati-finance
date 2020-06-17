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
				<div class="row">
					<div class="col-md-12">
						<table class="table-striped table-bordered table datatable">
							<thead>
								<tr>
									<th>#</th>
									<th>Client Name</th>
									<th>Premium Amount</th>
									<th>Finance Amount</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
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