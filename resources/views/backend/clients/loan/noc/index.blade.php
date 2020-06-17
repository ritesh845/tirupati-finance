@extends('backend.layouts.main')
@section('page_name','Loan Noc')
@section('content')
<div class="row">	
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				No Objection Certificate
				<a href="{{route('loan.show',$loan->id)}}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-angle-left"></i> Back</a>
			</div>
			<div class="card-body">
				<div class="row ">
					<div class="col-md-10 m-auto">
						<div class="card">
							<div class="card-header bg-white">
								<img src="{{asset('images/header_noc1.png')}}" style="width: 100%; height: 115px">
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6 col-sm-6 col-xs-6 col-xl-6">
										<b>Serial No:</b> 
									</div>
									<div class="col-md-6 col-sm-6 col-xs-6 col-xl-6 text-right"><b>Date:</b> {{date('d-m-Y')}} 
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 mt-3">
										<h5 class="text-primary text-center"><i>NO OBJECTION CERTIFICATE</i></h5>	
									</div>
									<div class="col-md-12 mt-3">
										<p><b>Name:</b> {{$loan->client->name}}</p>
										<p><b>Father Name:</b> {{$loan->client->father_name}}</p>
										<p><b>Vehicle Number:</b>
										{{$loan->vehicle_no}} </p>
										<p><b>Engine Number:</b>
										{{$loan->vehicle_engine_no}} </p>
										<p><b>Chassis Number:</b>
										{{$loan->vehicle_chassis_no}} </p>
										<p><b>Certificate that</b></p>
										{{-- <p>Vehicle number on amount <i class="fa fa-rupee"></i>{{$loan->finance_amount}}......................... was given</p> --}}
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection