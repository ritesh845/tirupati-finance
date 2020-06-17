@extends('backend.layouts.main')
@section('page_name','Message')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card border-top-primary">
			<div class="card-header ">Message Create
				<a href="{{route('message')}}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-angle-left"></i> Back</a>
			</div>
			<div class="card-body">
				{{Form::open(array('route' => 'message.store','method' => 'post'))}}
				<div class="row">
					<div class="col-md-12 form-group">
						{{Form::label('client_id','Client Name',['class' => 'required'])}}
						{{Form::select('client_id[]',$clients,old('client_id[]'),['class'=>'form-control client','multiple'=>"multiple",'required' => 'required'])}}
						@error('client_id')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-12 form-group">
						{{Form::label('message','Compose Message',['class' => 'required'])}}<span class="text-muted"> (Do not use & symbol)</span>
						<br>
						{{Form::textarea('message','',['class'=>'form-control','required' => 'required','placeholder' => 'Type your message here..','row' =>'2', 'cols' =>'2'])}}
						@error('message')
					        <span class="text-danger" role="alert">
					            <strong>{{ $message }}</strong>
					        </span>
					    @enderror
					</div>
					<div class="col-md-12 form-group">
						{{Form::submit('Message Send',['class' => 'btn btn-sm btn-success'])}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('.required').append('<span class="text-danger"> * </span>');
	    $('.client').select2({
	    	 placeholder: "Select Client",
	    	  allowClear: true
	    });

	    @if($message = Session::get('message'))
	    	$.notify("{{$message}}",'success');
	    @endif
	 });
</script>
@endsection