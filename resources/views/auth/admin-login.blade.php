@extends('common.main')
@section('title','Admin Log In')
@section('content')


<div class = "container">
    <div class = "row justify-content-center">
        <div class = "col-lg-6 new">
            <h1>Admin Log In</h1>
            <form class = "email shadow-lg" method = "POST" action = "{{ route ('admin.login.submit') }}">
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
        color: #00737a;
        text-align: center;
    }

    .email {
        padding: 15px;
        border-radius: 15px;
        background-color: white;
    }

    .btn {
        color: white;
        background-color: #00737a;
    }
</style>

@endsection