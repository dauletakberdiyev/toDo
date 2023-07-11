@extends('app')

@section('title')
    To Do
@endsection

@section('content')
    @include('navbar')

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="row mt-3">
        <div class="col-12 align-self-center">
            <ul class="list-group">
                @foreach ($todos as $todo)
                    <li class="list-group-item"><a href="/todos/{{ $todo->id }}">{{ $todo->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection