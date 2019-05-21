@extends('layouts.app')
@section('content')
<!--
	<div class="col-md-4 col-sm-8">
		<a href="{{ URL::previous() }}" class="btn btn-primary my-3">Go Back</a>
	</div>
-->

<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<div class="jumbotron" style="background-color: white;">
				<img class="img-responsive" src="/storage/productImage/{{$product->productImage}}" alt="Product Image" style="width:300px; height:300px;">
			</div>
		</div>
		<div class="col-lg-8">

			<div class="jumbotron" style="background-color: white;">
				<div class="container">
					<div>
						<blockquote class="blockquote text-left">
							<footer class="blockquote-footer"><cite title="Source Title">Product's Details Information</cite></footer>
						</blockquote>
						<h2 class="text-capitalize" ><strong class="d-inline-block mb-2 text-info">{{$product->productName}}</strong></h2>
						<div class="mb-1 text-muted text-capitalize"><strong class="d-inline-block mb-2 text-secondary">Category: {{$product->category->name}}</strong></div>
						<div class="mb-1 text-muted"><strong class="d-inline-block mb-2 text-primary">Buying Price: ${{$product->buyPrice}}</strong></div>
						<div class="mb-1 text-muted"><strong class="d-inline-block mb-2 text-danger">Selling Price: ${{$product->sellPrice}}</strong></div>
						<!--
						<div class="mb-1 text-muted"><strong class="d-inline-block mb-2 text-warning">Availability: In Stock</strong></div>
						-->
					</div>
					<div class="mb-1 text-muted">
						<strong class="d-inline-block mb-2 text-dark">Quantity: 
							@if($product->quantity<10)
								<span class="badge badge-pill badge-warning">{{$product->quantity}}</span>

							@else
								<span class="badge badge-pill badge-info"> {{$product->quantity}}</span>
							@endif
						</strong>
					</div>
					<div class="container">
						<p class="text-justify">{{$product->details}}</p>
					</div>				
					@can('edit product','delete product')
					<div>
						<hr/>
						<div class="d-inline-block">
							<a class="btn btn-outline-warning btn-sm" href="/products/{{$product->id}}/edit">Edit</a>
						</div>
						@can('delete product')
						<div class="d-inline-block">
							<form method="POST" action="{{route('products.destroy',$product->id)}}">
								@method('DELETE')
								@csrf
								<button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
							</form>
						</div>
						@endcan
					</div>
					@endcan
				</div>
			</div>
		</div>
	</div>
</div>
@endsection