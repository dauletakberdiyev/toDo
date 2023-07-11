@extends('app')

@section('title')
    Edit TODO
@endsection

@section('content')
    <form action="{{ route('todos.update',  $todo->id) }}" method="post" class="mt-4 p-4" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        @csrf
        <div class="form-group m-3">
            <label for="name" class="fw-bold">Todo Name</label>
            <input type="text" class="form-control" name="name" value="{{$todo->name}}">
        </div>
        <div class="form-group m-3">
            <label for="description" class="fw-bold">Todo Description</label>
            <textarea class="form-control" rows="3" name="desc">{{$todo->desc}}</textarea>
        </div>
        <div class="form-group m-3">
            <label for="picture" class="fw-bold">Todo Image</label>
            <div>
                <input type="checkbox" id="delPicture" name="delPicture">
                <label for="delPicture">Delete Image</label>
            </div>
            <span>Or Change</span>
            <input type="file" class="form-control" name="picture" accept="image/*">
        </div>
        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="Update">
        </div>
    </form>
@endsection