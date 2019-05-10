@extends('layouts.app')
@section('content')
<div class="container">
	<div id="header"></div>
	<div>
		<h1 class="h2">Dashboard</h1>
		<hr />
		<div class="w3-row-padding w3-margin-bottom">
			<div class="w3-third">
				<div class="w3-container w3-brown w3-padding-16">
				<a class="div-link "href="/products">

					<div class="w3-left">
						<i class="fa fa-diamond w3-xxxlarge"></i>
					</div>
					<div class="w3-right">
						<h3>{{$totalProducts}}</h3>
					</div>
					<div class="w3-clear"></div>
					<h4>Total Products in Stock</h4>
				</a>

				</div>
			</div>
			@role('admin')
			<div class="w3-third">
				<div class="w3-container w3-teal w3-padding-16">
				<a class="link" href="/employees">
					<div class="w3-left">
						<i class="fa fa-users w3-xxxlarge"></i>
					</div>
					<div class="w3-right">
						<h3>{{$numberOfEmployees}}</h3>
					</div>
					<div class="w3-clear"></div>
					<h4>Employees</h4>
				</a>
				</div>
			</div>
			@endrole
			<div class="w3-third">
				<div class="w3-container w3-blue w3-padding-16">
					<div class="w3-left">
						<i class="fa fa-dropbox w3-xxxlarge"></i>
						<i class="fa fa-dollar w3-xlarge"></i>
					</div>
					<div class="w3-right">
						<h3>{{$stockValue}}</h3>
					</div>
					<div class="w3-clear"></div>
					<h4>Value of Stock</h4>
				</div>
			</div>
			<div class="w3-third" style="padding-top: 10px;">
				<div class="w3-container w3-red w3-padding-16">
					<div class="w3-left">
						<i class="fa fa-trash w3-xxxlarge"></i>
					</div>
					<div class="w3-right">
						<h3>{{$damage}}</h3>
					</div>
					<div class="w3-clear"></div>
					<h4>Damage</h4>
				</div>
			</div>
			<div class="w3-third" style="padding-top: 10px;">
				<div class="w3-container w3-orange w3-padding-16">
					<div class="w3-left">
						<i class="fa fa-dollar w3-xxxlarge"></i>
					</div>
					<div class="w3-right">
						<h3>#####</h3>
					</div>
					<div class="w3-clear"></div>
					<h4>Revenue</h4>
				</div>
			</div>
			<div class="w3-third" style="padding-top: 10px;">
				<div class="w3-container w3-green w3-padding-16">
					<div class="w3-left">
						<i class="fa fa-dollar w3-xxxlarge"></i>
					</div>
					<div class="w3-right">
						<h3>#####</h3>
					</div>
					<div class="w3-clear"></div>
					<h4>Profit</h4>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
@endSection