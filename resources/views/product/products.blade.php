@extends('layouts.app')
@section('content')
<div>
	<h1 class="h2">Detailed List of Products</h1>
	<hr />
	<div class="container">
		<form class="form-inline">
			<input class="form-control mr-sm-2" type="text" placeholder="Search Products">
			<button class="btn btn-secondary" type="submit">Search</button>
		</form><br/>
		<div class="table-responsive">
			<table class="table  table-hover">
				<thead class="thead-light">
					<tr>
						<th>Product Name</th>
						<th>Image</th>
						<th>Category</th>
						<th>Buying PUP</th>
						<th>Selling PUP</th>
						<th>Quantity</th>
						@can('edit product','delete product')
						<th>Action</th>
						@endcan
					</tr>
				</thead>
				<tbody>
					@if(count($products)>0)
					@foreach($products as $product)
					<tr>
						<td>
							<a class="text-capitalize" href="/products/{{$product->id}}">{{$product->productName}}</a>
						</td>
						<td>
							<img style="width:35px;height:35px" class="rounded" src="/storage/productImage/{{$product->productImage}}"alt="Product Image">
						</td>
<!--						<td class="text-capitalize">{{$product->category->name}}</td>-->
						<td>{{$product->buyPrice}}</td>
						<td>
							{{$product->sellPrice}}</td>
						<td>{{$product->quantity}}</td>
						@can('edit product','delete product')
						<td>
							<div class="d-inline-block">
								<a class="btn btn-warning btn-sm" href="/products/{{$product->id}}/edit">Edit</a>
							</div>
							<div class="d-inline-block">
								<form method="POST" action="{{route('products.destroy',$product->id)}}">
								@method('DELETE')
								@csrf
								<button type="submit" class="btn btn-danger btn-sm">Delete</button>
							</form>
							</div>
						</td>
						@endcan
					</tr>
					@endforeach
					@else
					<h1>No product found</h1>
					@endif
				</tbody>
			</table>
			<nav aria-label="Page navigation example">
				<ul class="pagination pagination-sm justify-content-center">
					<li class="page-item">
						<a class="page-link" href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>
					<li class="page-item active"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item">
						<a class="page-link" href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>
@endsection