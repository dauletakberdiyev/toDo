@extends('welcome')

@section('title')
    Register
@endsection

@section('content')
    <div class="d-flex align-items-center justify-content-center mt-5">
        <form>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="form2Example1" class="form-control" placeholder="Email"/>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="form2Example2" class="form-control" placeholder="Password"/>
            </div>

            <div class="form-outline mb-4">
                <input type="password" id="form2Example3" class="form-control" placeholder="Confirm Password"/>
            </div>

            <!-- Submit button -->
            <button type="button" class="btn btn-primary btn-block mb-4 w-100">Sign up</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Already have an account? <a href="/login">Login</a></p>
            </div>
        </form>
    </div>
@endsection
