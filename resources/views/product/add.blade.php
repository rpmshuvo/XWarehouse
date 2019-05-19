@extends('layouts.app')
@section('content')
<div>
	<h1 class="h2">Add New Product</h1>
	<hr />
	<div class="container">
		<form method="POST" action="{{route('products.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
			@csrf
			<div class="form-row">
				<div class="form-group col-md-4">
					<input type="text" class="form-control" name= "productName" id="productName" placeholder="Product Name" required>
				</div>
				<div class="form-group col-md-2">
					<input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity" min='0' required>
				</div>
				<div class="form-group col-md-4">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="Cat">Category</label>
						</div>
						<select class="custom-select" name="category_id" id="category" required>
							<option value="" selected>Choose...</option>
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
						<input type="number" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" name="buyPrice" id="buyPrice" required placeholder="0.00" min='0'>
					</div>
				</div>
				<div class="form-group col-md-3">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">$</span>
							<span class="input-group-text">Selling PUP</span>
						</div>
						<input type="number" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" name="sellPrice" id="sellPrice" required placeholder="0.00" min='0'>
					</div>
				</div>
				<div class="form-group col-md-4">
					<input type="file" class="form-control-file" name="productImage" id="image">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-10">
					<textarea class="form-control" name="details" id="details" placeholder="Write more details about product." rows="3"></textarea>
				</div>
			</div>
			<button class="btn btn-primary" type="submit" value="0" name="save">save</button>
			<button class="btn btn-success" type="submit" value="1" name="save">Save and Add another</button>
		</div>
	</form>
</div>
@endsection
