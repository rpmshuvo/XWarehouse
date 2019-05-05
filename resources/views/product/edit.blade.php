@extends('layouts.app')
@section('content')
<div>
	<h1 class="h2">Edit Product</h1>
	<hr />
	<div class="container">
		<form method="POST" action="{{route('products.update',$product->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
			@method('PUT')
			@csrf
			<div class="form-row">
				<div class="form-group col-md-4">
					<input type="text" class="form-control" name= "productName" value="{{$product->productName}}" id="productName" placeholder="Product Name" required>
				</div>
				<div class="form-group col-md-2">
					<input type="number" class="form-control" name="quantity" value="{{$product->quantity}}" id="Quantity" placeholder="Quantity" required>
				</div>
				<div class="form-group col-md-4">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="category">Category</label>
						</div>
						<select class="custom-select" name="category_id" id="category" required>
							<option value="{{$product->category_id}}" selected>{{$product->category->name}} </option>
							@if(count($categories)>0)
							@foreach($categories as $category)
								<option value="{{$category->id}}">{{$category->name}}</option>

							@endforeach
							@endif
						</select>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-3">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">$</span>
							<span class="input-group-text">Buying PUP</span>
						</div>
						<input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" name="buyPrice" value="{{$product->buyPrice}}" id="buyPrice" required placeholder="0.00">
					</div>
				</div>
				<div class="form-group col-md-3">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">$</span>
							<span class="input-group-text">Selling PUP</span>
						</div>
						<input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" name="sellPrice" value="{{$product->sellPrice}}" id="sellPrice" required placeholder="0.00">
					</div>
				</div>
				<div class="form-group col-md-4">
					<input type="file" class="form-control-file" name="productImage" id="image">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-10">
					<textarea class="form-control" name="details"  id="details" placeholder="Write more details about product." rows="3">{{$product->details}}</textarea>
				</div>
			</div>
			<button class="btn btn-primary" type="submit" name="save">save</button>
		</div>
	</form>
</div>
@endsection
