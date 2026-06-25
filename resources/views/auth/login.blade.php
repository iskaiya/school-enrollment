@extends('common.main')
@section('title', 'Log In')
@section('content')

<div class = "container">
    <div class = "row justify-content-center">
        <div class = "col-lg-6 new">
            <h1>Log In</h1>
            <form class = "email shadow-lg" method = "POST" action = "">
                @csrf
            
            @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                {{ $error }}
                </div>
                @endforeach
            @endif

             
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "email">
            
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name = "password">
            </div>

            
            <button type="submit" class="btn">Log In</button>

            <div class="form-group mt-4 text-center">
            <hr class="my-4">
            
            <!-- Clear, secondary path for school administrators -->
            <p class="text-muted small mb-0">
                School staff or administrator? 
                <a href="{{ route('admin.login') }}" class="text-danger font-weight-bold">
                    Go to Admin Portal
                </a>
            </p>
        </div>

            </form>
        </div>
    </div>
</div>

<style>

    body{
        background-repeat: no-repeat;
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    .new h1 {
        margin-top: 30px;
        color: #007dc4;
        text-align: center;
    }

    .email {
        padding: 15px;
        border-radius: 15px;
        background-color: white;
    }

    .btn {
        color: white;
        background-color: #007dc4;
    }
</style>


@endsection