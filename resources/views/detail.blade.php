@extends('welcome')

@section('title')
    Details TODO
@endsection

@section('content')
    @include('navbar')

    <div class="card text-center mt-5">
        <div class="card-header">
            <b>TODO DETAILS</b>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$todo->name}}</h5>
            <p class="card-text">{{$todo->desc}}</p>
            @if (!is_null($todo->picture))
                <div class="d-flex w-100 justify-content-center">
                    <img 
                        class="img-fluid" 
                        src="{{URL::to('/')}}/images/{{$todo->picture}}" 
                        width="150" height="150"
                        onclick="onClickImg(this.currentSrc)"
                        style="cursor: pointer"
                    >
                </div>
            @endif
            <div class="d-flex justify-content-center mt-3">
                <a href="{{$todo->id}}/edit" class="me-3 btn btn-primary">Edit</a>
                <form action="{{ route('todos.destroy', $todo->id) }}" method="post">
                    <input type="submit" class="btn btn-danger" value="Delete">
                    @method('delete')
                    @csrf
                </form>
                <a href="{{$todo->id}}/assign" class="btn btn-info ms-3">Assign</a>
            </div>
        </div>
</div>
@endsection
@section('js')
    <script type="text/javascript">
        function onClickImg($src){
            window.open($src, '_blank')
        }
    </script>
@endsection