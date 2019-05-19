@extends('layouts.app')
@section('content')
<div>
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-9">
			<h1>List of Products</h1>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3">
			@role('admin|moderator')
			<a class="btn btn-sm btn-info" href="/products/create">Add Products</a>
			@endrole
		</div>
	</div>

	<div class="container">
		<form class="form-inline">
			<input class="form-control mr-sm-2" type="text" placeholder="Search Products">
			<button class="btn btn-secondary" type="submit">Search</button>
		</form><br/>
		<div class="table-responsive">
			<table id="productsTable" class="table  table-hover">
				<thead class="thead-light">
					<tr>
						<th>Product Name</th>
						<th>Image</th>
						<th>Category</th>
						<th>Buying PUP</th>
						<th>Selling PUP</th>
						<th>Quantity</th>
						<th>Status</th>
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
						<td class="text-capitalize">{{$product->category->name}}</td>
						<td>{{$product->buyPrice}}</td>
						<td>
							{{$product->sellPrice}}</td>
							<td>{{$product->quantity}}</td>
							<td>
								@if($product->status == false)
								Out of Stock
								@else
								In Stock
								@endif


							</td>
							@can('edit product')
							<td>
								<div class="d-inline-block">
									<a class="btn btn-warning btn-sm" href="/products/{{$product->id}}/edit">Edit</a>
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
				<div align="center">
					{{$products->onEachSide(1)->links()}}
				</div>

			</div>
		</div>
	</div>
	@endsection