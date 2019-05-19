@extends('layouts.app')
@section('content')
  <div class="container ml-1">
    <h1>Add Category</h1>
    <form method="POST" action="{{route('categories.store')}}">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <input class="form-control" type="text" name="category" placeholder="Category Name">
                    <br>
                    <button type="submit" class="btn btn-primary">save</button>
                </div>
            </div>
        </div>
    </form>
  </div>
@endsection
