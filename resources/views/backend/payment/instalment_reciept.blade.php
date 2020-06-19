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
			<div class="col-md-6 m-auto ">
				<div class="card card-shadow-1">
					<div class="card-header bg-white text-center p-0">
						<img src="{{asset('images/header_noc1.png')}}" style="width: 100%; height: 115px">
					</div>
					<div class="card-body">
						<h5 class="text-center font-weight-bold"><i>INSTALMENT RECIEPT</i></h5>
						<br>
						<div class="row">
							<div class="col-md-6">
								Instalment Number : {{$instalment->instalment_no}}
							</div>
							<div class="col-md-6 text-right">
								Date : {{date('d-m-Y')}}
							</div>
						</div>
						<br>

						<div class="row">
							<div class="col-md-6">
								<h6>
									Name : {{$instalment->client_loan->hirer_name}}
								</h6>
								<h6>
									Mobile : {{$instalment->payment->mobile}}
								</h6>								
								<h6>
									Vehicle Type : {{Arr::get(VEHICLETYPE,$instalment->client_loan->vehicle_type)}}
								</h6>
							</div>
							<div class="col-md-6 text-right">
								<h6>
									Payment Mode: {{Arr::get(PAYMENTMODE,$instalment->payment->payment_mode)}}
								</h6>
								<h6>
									Pay ID: {{$instalment->payment->order_id}}
								</h6>
							</div>
						</div>
						{{-- <h6 class="text-right">Date: </h6> --}}
						
						
						<br>
						<table class="table table-bordered table-striped mt-2">
							<thead>
								<tr>
									<th>Instalment Amount</th>
									<th>Late Amount</th>
									<th>Total Amount</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{$instalment->amount}}</td>
									<td>{{$instalment->late_amount}}</td>
									<td>{{$instalment->payment->instalment_amount}}</td>
								</tr>
							</tbody>
						</table>			
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