@extends('layouts.app')
@section('content')
  <div class="container ml-1">
    <h1>Add Category</h1>
    <form method="POST" action="{{route('categories.update',$category->id)}}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Category Name:</label>
                    <input class="form-control" type="text" name="category" value="{{$category->name}}" placeholder="Category Name">
                    <button type="submit" class="btn btn-primary">save</button>
                </div>
            </div>
        </div>
    </form>
  </div>
@endsection
