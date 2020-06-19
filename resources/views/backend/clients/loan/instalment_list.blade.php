{{Form::hidden('amount',$loan->total_amount,['id'=>"amount_hidden"])}}
<table class="table table-striped table-bordered">
<thead>
	<tr>
		<th>#</th>
		<th>Premium Amount</th>
		<th>Instalment Date</th>
	</tr>
</thead>
<tbody id="tbody">
	@php $count =1;  
		$date = Carbon\Carbon::parse($instalment_start_date);
	@endphp
	@foreach($loan->instalments as $instalment)

	<tr>
		<td>{{$count}}</td>

		<td>
			{{Form::input('text','premium[]',$instalment->premium,['class'=>'form-control premium','readonly' => 'readonly'])}}</td>
		<td>
			{{Form::input('text','instalment_date[]',date('Y-m-d',strtotime($date)),['class'=>'form-control datepicker'])}}
			{{Form::hidden('instalment_no[]',$count)}}
		</td>
	</tr>
		@php
			$count++;
			$date = $date->addMonths('1');
		@endphp
	@endforeach
</tbody>
</table>
<script >
	$(document).ready(function(){
		 $(function() {
			$('.datepicker').datepicker({
				format:'yyyy-mm-dd',
			});
		});
	})
</script>
