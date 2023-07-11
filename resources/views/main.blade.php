@extends('app')

@section('title')
    To Do
@endsection

@section('content')
    @include('navbar')

    <div class="row mt-3">
        <div class="col-12 align-self-center">
            <ul class="list-group">
                <li class="list-group-item"><a href="details">Dummy todo here</a></li>
                <li class="list-group-item"><a href="details">Dummy todo here</a></li>
                <li class="list-group-item"><a href="details">Dummy todo here</a></li>
                <li class="list-group-item"><a href="details">Dummy todo here</a></li>
                <li class="list-group-item"><a href="details">Dummy todo here</a></li>
            </ul>
        </div>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@endsection