@extends('app')

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
            <div class="d-flex w-100 justify-content-center">
                <img 
                    class="img-fluid" 
                    src="{{URL::to('/')}}/images/{{$todo->picture}}" 
                    width="150" height="150"
                    onclick="onClickImg(this.currentSrc)"
                    style="cursor: pointer"
                >
            </div>
            <a href="{{$todo->id}}/edit"><span class="btn btn-primary">Edit</span></a>
            <a href="delete/{{$todo->id}}"><span class="btn btn-danger">Delete</span></a>
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