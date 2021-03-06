@extends('layouts.app')
@section('content')
<a class="btn btn-info" href="/invoices/create"><span style="color:light" >Checkout Form</span></a>
<div class="container">
	<h1 class="h2">List of Invoices</h1>
	<hr />
	<div class="table-responsive-sm">
		@if(count($invoices)>0)
		<table class="table table-bordered table-hover table-sm">
			<thead class="thead-light">
				<tr>
					<th>Id</th>
					<th>Total Amount</th>
					<th>Discount( In Amount)</th>
					<th>Net Amount</th>
					<th>Paid Amount</th>
					<th>Due Amount</th>
					<th>print</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($invoices as $invoice)
				<tr>
					<td>
						<a href="/invoices/{{$invoice->id}}">
							{{$invoice->id}}
						</a>
					</td>
					<td>{{$invoice->totalAmount}}</td>
					<td>{{$invoice->discount}}</td>
					<td>{{$invoice->netAmount}}</td>
					<td>{{$invoice->paidAmount}}</td>
					<td>{{$invoice->amountDue}}</td>
					<td><a class="btn btn-info" href="/generate-Pdf/{{$invoice->id}}" target="_blank">PDF</a></td>
					<td>
						@can('delete product')
						<div class="d-inline-block">
							<form method="POST" action="{{route('invoices.destroy',$invoice->id)}}">
								@method('DELETE')
								@csrf
								<button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
							</form>
						</div>
						@endcan
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{$invoices->onEachSide(1)->links()}}
		@else
		<h1>No Invoices Found</h1>
		@endif
	</div>

	@endsection