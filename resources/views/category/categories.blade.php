@extends('layouts.app')
@section('content')
<div class="container ml-1">
  
    
      <h1>Category</h1>
    
  <div class="row">
    <div class="col-lg-9 col-md-6">
      <table class="table table-hover">
        <thead class="thead-light">
          <tr>
            <th>Id</th>
            <th>Name</th>
            @can('edit product','delete product')
            <th>Action</th>
            @endcan
          </tr>
        </thead>
        @if (count($categories)>0)
        @foreach ($categories as $key => $category)
        <tr>
          <td>{{$category->id}}</td>
          <td class="text-capitalize">{{$category->name}}</td>
          @can('edit product','delete product')
          <td>
            <div class="d-inline-block">
              <a class="btn btn-warning btn-sm" href="/categories/{{$category->id}}/edit">Edit</a>
            </div>
            <div class="d-inline-block">
              <form method="POST" action="{{route('categories.destroy',$category->id)}}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
            </div>
          </td>
          @endcan
        </tr>
        @endforeach
      </table>
      @else
      <strong>no category available</strong>
      @endif

    </div>
  </div>
</div>
@endsection
