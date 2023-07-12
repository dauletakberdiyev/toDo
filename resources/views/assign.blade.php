@extends('welcome')

@section('title')
    Assign TODO
@endsection

@section('content')
    @include('navbar')
    
    <form action="{{ route('todos.assign', request()->route('id')) }}" method="post">
        @csrf
        <div class="row mt-3">
            <div class="col-12 align-self-center">
                <ul class="list-group">
                    @foreach ($users as $user)
                        <li class="list-group-item">
                            <input 
                                type="checkbox" 
                                name="user_id_{{ $user->id }}" 
                                id="{{ $user->id }}" 
                                value="{{ $user->id }}"
                            >
                            <label for="{{ $user->id }}">{{ $user->name }}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <input type="submit" class="btn btn-primary mt-3" value="Submit">
    </form>
@endsection