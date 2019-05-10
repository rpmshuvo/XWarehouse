@extends('layouts.app')
@section('content')
{{$returninfo}}
<div class="container">
	<div class="row">
		<div class="col-6">
			<div class="jumbotron" style="background-color: white;">
				<div class="container">
					<div>
						<blockquote class="blockquote text-left">
							<footer class="blockquote-footer"><cite title="Source Title">Return Product's Details Information</cite></footer>
						</blockquote>
						<h2 class="text-capitalize" ><strong class="d-inline-block mb-2 text-info">Rreturn Form Id: {{$returninfo->id}}</strong></h2>
						<div class="mb-1 text-muted text-capitalize"><strong class="d-inline-block mb-2 text-secondary">Product Id: {{$returninfo->product_id}} </strong></div>
						<div class="mb-1 text-muted"><strong class="d-inline-block mb-2 text-primary">Return Quantity: {{$returninfo->returnQuantity}}</strong></div>
						<div class="mb-1 text-muted"><strong class="d-inline-block mb-2 text-danger">Damage Quantity: {{$returninfo->damage}} </strong></div>
					</div>
					<div class="mb-1 text-muted">
						<strong class="d-inline-block mb-2 text-dark">Amount to return: 
							
								<span class="badge badge-pill badge-warning">{{$returninfo->returnAmount}}</span>

						</strong>
					</div>
					<div class="container">
						<p class="text-justify"></p>
					</div>
				</div>
			</div>

			
		</div>
		
	</div>
	<div class="row">
		<div class="col">
			<a class="btn btn-primary" href="">
				Back
			</a>
		</div>
		<div class="col">
			<button class="btn btn-info" type="submit">
				Print
			</button>
		</div>
		
	</div>
	
</div>
@endsection