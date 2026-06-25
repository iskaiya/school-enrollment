@extends('common.main')
@section('title', 'Register')
@section('content')

<div class = "container">
    <div class = "row justify-content-center">
        <div class = "col-lg-6 new">
            <h1>Register</h1>
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
                <label for="exampleInputName1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputName1" name = "name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "email">
            
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name = "password">
            </div>

            <div class="mb-3">
                <label for="exampleConfirmPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name = "password_confirmation">
            </div>
            
            <button type="submit" class="btn">Register</button>
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