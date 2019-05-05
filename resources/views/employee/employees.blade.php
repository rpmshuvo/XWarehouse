@extends('layouts.app')
@section('content')
<div class="container ml-1">
	<div class="row">
		<div class="col">
			<h1>Employees</h1>
			<h1>{{Auth::user()->name}}</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<table class="table table-hover">
				<thead class="thead-light">
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Action</th>
					</tr>
				</thead>
				@if (count($employees)>0)
				@foreach ($employees as $key => $employee)
				<tr>
					<td>{{$employee->id}}</td>
					<td class="text-capitalize">{{$employee->name}}</td>
					<td>{{$employee->email}}</td>
					<td>{{$employee->roles->pluck('name')}}</td>
					<td>
						<div class="d-inline-block">
							<a class="btn btn-warning btn-sm" href="/employees/{{$employee->id}}/edit">Edit</a>
						</div>
						@if(Auth::user()->id != $employee->id)
						<div class="d-inline-block">
							<form method="POST" action="{{route('employees.destroy',$employee->id)}}">
								@method('DELETE')
								@csrf
								<button type="submit" class="btn btn-danger btn-sm">Delete</button>
							</form>
						</div>
						@endif
					</td>
				</tr>
				@endforeach
			</table>
			@else
			<strong>no employee available</strong>
			@endif

		</div>
	</div>
</div>
@endsection
