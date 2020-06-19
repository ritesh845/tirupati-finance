@extends('backend.layouts.main')
@section('page_name','Change Password')
@section('content')
<div class="row">
	<div class="col-md-6 offset-3 col-centered">
		<div class="card">
			<div class="card-header">Change Password
			</div>
			<div class="card-body">
				@if($message = Session::get('success'))
					<div class="alert bg-success">
						{{$message}}
					</div>
				@endif
				@if($message = Session::get('warning'))
					<div class="alert bg-warning">
						{{$message}}
					</div>
				@endif
				
				<form action="{{route('change-password')}}" method="post">
					@csrf
					<div class="row">
						<div class="col-md-12 form-group">
							<label>Old Password</label>
							<input type="password" name="old_password" class="form-control" id="password-field1" required="required" value="{{old('old_password')}}">
							<span toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							@error('old_password')
                            <span style="color:#e3342f; font-size: 80%;">
                                <strong>{{ $message }}</strong>
                            </span>
                        	@enderror
						</div>
						<div class="col-md-12 form-group">
							<label>New Password</label>
							<input type="password" name="new_password" class="form-control" id="password-field2" >
							<span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							@error('new_password')
                                <span style="color:#e3342f; font-size: 80%;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="col-md-12 form-group">
							<label>Confirm Password</label>
							<input type="password" name="confirm_password" class="form-control" id="password-field3" >      
							<span toggle="#password-field3" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						</div>	
						<div class="col-md-12 form-group">
							<button class="btn btn-primary btn-block">Save</button>
						</div>
					</div> 
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(".toggle-password").click(function() {

		  $(this).toggleClass("fa-eye fa-eye-slash");
		 
		  var input = $($(this).attr("toggle"));
		  if (input.attr("type") == "password") {
		    input.attr("type", "text");
		  } else {
		    input.attr("type", "password");
		  }
	});
</script>
@endsection