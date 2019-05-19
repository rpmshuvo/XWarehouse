@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
      <div class="col-8">
        <h1>Category</h1>
      </div>
      <div class="4">
        @role('admin|moderator|salesman')
        <a class="btn btn-sm btn-info" href="/returninfos/create">Return Form</a>
        @endrole
      </div>
    </div>
	<hr />
	<div class="container">
		<div>
			<table class="table table-bordered table-hover table-sm">
				<thead class="thead-light">
					@if(count($returninfos)>0)
					<tr>
						<th>#Id</th>
						<th>Product Id</th>
						<th>Return Quantity</th>
						<th>Damage</th>
						<th>Return Money</th>
						<th>Invoice Id</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($returninfos as $returninfo)
					<tr>
						<td><a href="/returninfos/{{$returninfo->id}}">{{$returninfo->id}}</a></td>
						<td><a href="/products/{{$returninfo->product_id}}"><span class="text-muted badge badge-warning badge-pill"  style="color: gray; width:50px;">{{$returninfo->product_id}}</span></a></td>
						<td>{{$returninfo->returnQuantity}}</td>
						<td>{{$returninfo->damage}}</td>
						<td>{{$returninfo->returnAmount}}</td>
						<td><a href="/invoices/{{$returninfo->invoice_id}}"><span class="text-muted badge badge-warning badge-pill"  style="color: gray; width:50px;">{{$returninfo->invoice_id}}</span></a></td>
						<td><a class="btn btn-primary btn-sm" href="/returnform-Pdf/{{$returninfo->id}}" target="_blank">Print</a></td>
					</tr>
					@endforeach
				

				</tbody>
			</table>
			{{$returninfos->onEachSide(1)->links()}}
			@else
			<h1>Not Found any return Form</h1>
				@endif
		</div>
	</div>
</div>
@endsection