@extends('app')

@section('title')
    Create TODO
@endsection

@section('content')
    @include('navbar')

    <form action="{{ route('todos.store') }}" method="post" class="mt-4 p-4" enctype="multipart/form-data">
        @csrf
        <div class="form-group m-3">
            <label for="name">Todo Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group m-3">
            <label for="description">Todo Description</label>
            <textarea class="form-control" name="desc" rows="3" required></textarea>
        </div>
        <div class="form-group m-3">
            <label for="picture">Todo Image</label>
            <input type="file" class="form-control" name="picture" accept="image/*">
        </div>
        <input type="hidden" name="user_id" value="1">
        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="Submit">
        </div>
  
    </form>
@endsection