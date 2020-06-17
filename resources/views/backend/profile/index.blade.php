@extends('backend.layouts.main')
@section('page_name','Profile')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card border-top-primary">
			<div class="card-header ">
				Profile Detail
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						
					</div>
					<div class="col-md-8">
						<h6>Name : {{Auth::user()->name}}</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection