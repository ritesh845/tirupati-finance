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
<div class="container-fluid p-2" style="background-color: lightgray">
	<div class="row">			
		<div class="col-md-12 m-0">
			<div class="card border-0">
				<div class="card-header bg-white border-0">
					VALID FOR ............................................. DAYS ONLY
				</div>
				<div class="card-body"  style="min-height: 550px;">
					<div class="row">
						<div class="col-md-12">
							<h3 class="text-center"><b>SEIZING AUTHOURITY</b></h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6 col-xl-6">
							{{-- <b>Serial No:</b>  --}}
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 col-xl-6 text-right"><b>Date:</b> {{date('d-m-Y')}} 
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 mt-3">
							<h5 class="text-center">Ref: .........................................................................................................</h5>	
						</div>
						<div class="col-md-12 mt-3">
							<h5 class="text-right">This is to authorise the bearer of the Seizing Authority</h5>
							<h5 class="">Shri ......................................................................................................................................................</h5>
							<h5 class="">of ................................................................................................................................................................. to response the vechicle referred
							<h5>to above from the Hirer Mr./Messrs ..................................................................................................................................................</h5>
							<h5>default to repay the Hire monies. This vechicle may be responsed from wherever of with whomsoever may be found and bring it to </h5>
							<h5>.................................................................................................................N. B. -payment should be made only by Draft and not by cash on any account</h5>
						</div>					
					</div>
					<br>
					<br>
					<br>
					<div class="row">
						<div class="col-md-8 mt-3">
						<p>.................................................................</p>
						<h6>Spceciman Signature of the person Authorised </h6>	

						</div>
						<div class="col-md-4 mt-3">
							<p>.................................................................</p>
						<h6 class="text-center">Owner</h6>	
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 mt-3">
							<h5><b>I hearby declare that I am surrending the vehicle to the authorized person on my own wish</b></h5>
						</div>
						<div class="col-md-12 mt-4">
							<p class="text-right">...............................</p>
							<h6 class="text-right">
								Signature of the Hirer
							</h6>
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