@extends('common.main')
@section('title', 'Change Password')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 new">
            <h1>Change Password</h1>
            <form class="email shadow-lg" method="POST" action="/password/change">
                @csrf

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label">Current Password</label>
                    <input type="password" class="form-control" name="current_password">
                </div>

                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>

                <button type="submit" class="btn">Confirm Change</button>
            </form>
        </div>
    </div>
</div>

<style>
    body {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
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