@extends('app')

@section('title')
    Create TODO
@endsection

@section('content')
    @include('navbar')

    <form action="{{ route('todos.store') }}" method="post" id="store_form" class="mt-4 p-4" enctype="multipart/form-data">
        @csrf
        <div id="success_msg"></div>
        <div class="form-group m-3">
            <label for="name">Todo Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group m-3">
            <label for="description">Todo Description</label>
            <textarea class="form-control" name="desc" rows="3" id="desc" required></textarea>
        </div>
        <div class="form-group m-3">
            <label for="picture">Todo Image</label>
            <input type="file" class="form-control" name="picture" id="picture" accept="image/*">
        </div>
        <input type="hidden" name="user_id" value="1" id="user_id">
        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="Submit" id="submit">
        </div>
  
    </form>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('submit', '#store_form',function (e) {
                e.preventDefault();

                var data = new FormData(this);
                // console.log(data);
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/todos",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#success_msg').addClass('alert alert-success');
                        $('#success_msg').text(response.message);
                        $('#store_form').find('input').val("");
                        $('#store_form').find('textarea').val("");
                    }
                });
            });
        });
    </script>
@endsection