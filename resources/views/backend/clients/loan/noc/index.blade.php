<!DOCTYPE html>
<html>
<head>
	<title></title>

  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <style >
  	
@page {
  size: 5.5in 8.5in;
}

@page {
  size: A4;
}

@page :left {
  margin-left: 3cm;
}

@page :right {
  margin-left: 4cm;
}


  </style>
</head>
<body>
<div class="container-fluid p-4" style="background-color: lightgray">
	<div class="row">			
		<div class="col-md-10 m-auto">
			<div class="card border-0">
				<div class="card-header bg-white">
					<img src="{{asset('images/header_noc1.png')}}" style="width: 100%; height: 115px">
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6 col-xl-6">
							{{-- <b>Serial No:</b>  --}}
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 col-xl-6 text-right"><b>Date:</b> {{date('d-m-Y')}} 
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 mt-3">
							<h4 class="text-primary text-center"><i>NO OBJECTION CERTIFICATE</i></h4>	
						</div>
						<div class="col-md-12 mt-3">
							<h5><b class="mr-2">Name:</b> {{$loan->client->name}}</h5>
							<h5><b class="mr-2">Father Name:</b> {{$loan->client->father_name}}</h5>
							<h5><b class="mr-2">Vehicle Number:</b>
							{{$loan->vehicle_no}} </h5>
							<h5><b class="mr-2">Engine Number:</b>
							{{$loan->vehicle_engine_no}} </h5>
							<h5><b class="mr-2">Chassis Number:</b>
							{{$loan->vehicle_chassis_no}} </h5>
							<br>
							<h5><b class="mr-2"> it is certificate that the loan is assign to that vehicle number  {{$loan->vehicle_number !=null ? $loan->vehicle_number : '....................................'}}. All the amount of loan has been assign and now no amount is left. So  No objection cetificate (NOC) is issued. </b> </h5>
							{{-- <h5>Vehicle number on amount <i class="fa fa-ruh5ee"></i>{{$loan->finance_amount}}......................... was given</h5> --}}
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
 window.print();
  window.onafterprint = function () {
         $('.printpage', window.parent.document).hide();
    }
	</script>
</body>
</html>