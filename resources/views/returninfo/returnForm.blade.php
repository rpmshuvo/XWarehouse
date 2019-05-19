@extends('layouts.app')
@section('content')
<div class="container">
	<div id="header"></div>
	<h1 class="h2">Return Form</h1>
	<hr />
	<div class="container">
		<div>
			<form method="POST" action="{{route('returninfos.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
				@csrf
				<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">Invoice Information</span>
				</h4>
				<div class="form-row">
					<div class=" form-group col-md-6 mb-3">
						<label for="invoiceId">Invoice Id </label>
						<input
						type="number"
						class="form-control"
						id="invoiceId"
						name = "invoiceId"
						placeholder="Invoice Id"
						value=""
						min='0'
						required
						/>
					</div>
					<div class="form-group col-md-6 mb-3">
						<label for="phoneNumber">Phone Number</label>
						<input
						type="number"
						class="form-control"
						id="phoneNumber"
						name="phoneNumber"
						placeholder="Phone Number"
						min='0'
						required
						/>
					</div>
				</div>
				<hr>
				<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">Product Description</span>
				</h4>
				<div class="form-row">
					<div class="form-group col-md-4">
						<input
						type="number"
						class="form-control"
						id="productId"
						name = "productId"
						placeholder="Product Id"
						required
						autofocus="autofocus"
						min='0'
						/>
					</div>
					<div class="form-group col-md-2">
						<input
						type="number"
						class="form-control"
						id="quantity"
						name=" quantity"
						placeholder="Quantity"
						min='1'
						required
						/>
					</div>
					<div class="form-group col-md-3">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Damage</span>
							</div>
							<input
							type="number"
							id="damage"
							name = "damage"
							class="form-control"
							min='0'
							required
							/>
						</div>
					</div>
				</div>
				<hr />
				<button
				class="btn btn-primary btn-lg"type="submit">Continue to return</button>
		</form>
	</div>
</div>
</div>
@endsection