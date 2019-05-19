@extends('layouts.app')
@section('content')
<h3>Return Information</h3>
<div class="row">
	<div class="col">


		Return Form Id #: {{$returninfo->id}}<br>
		Created: {{$returninfo->created_at}}<br>
		Invoice Id# {{$returninfo->invoice->id}}
	</div>
	<div class="col">
		<h5>Customer Information</h5>
		{{$returninfo->invoice->customer->name}}<br>
		{{$returninfo->invoice->customer->phoneNumber}}<br>
		{{$returninfo->invoice->customer->address}}
	</div>
</div>
<div class="row">
	<div class="col">
		
	
	<table class="table ">
		<tr>
			<td>
				Product Id
			</td>

			<td>
				Return Quantity 
			</td>

			<td>
				Damage
			</td>

			<td>
				Return Amount
			</td>
		</tr>
		<tr >
			<td>
				{{$returninfo->product_id}}
			</td>

			<td>
				{{$returninfo->returnQuantity}}
			</td>

			<td>
				{{$returninfo->damage}}
			</td>

			<td>
				{{$returninfo->returnAmount}}
			</td>
		</tr>
	</table>
</div>

</div>
<div  align="center">
	<a class="btn btn-info" href="/returnform-Pdf/{{$returninfo->id}}" target="_blank"> Print</a>
</div>

@endsection