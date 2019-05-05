@extends('layouts.app')
@section('content')
<div class="container">
	<h1 class="h2">List of Return Products <span style="color:red">(Demo value)</span></h1>
	<hr />
	<div class="container">
		<div>
			<table class="table table-bordered table-hover table-sm">
				<thead class="thead-light">
					<tr>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Damage</th>
						<th>Name</th>
						<th>Address</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Shirt</td>
						<td>50</td>
						<td>2</td>
						<td>Abc Company</td>
						<td>Motijhil</td>
					</tr>
					<tr>
						<td>Punjabi</td>
						<td>10</td>
						<td>1</td>
						<td>Jitu</td>
						<td>Nikunja-2</td>
					</tr>
					<tr>
						<td>T-Shirt</td>
						<td>5</td>
						<td>0</td>
						<td>XYZ Company</td>
						<td>Motijhil</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection