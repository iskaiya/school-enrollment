@extends('common.main')
@section('title', 'Log In')
@section('content')

    <div class = container>
        <div class = "row justify-content-center">
            <div class = "col-lg-6 student">
                <h1>Log In</h1>
                <form class = "login shadow-lg" action="">
                    @csrf

                    <div class = "mb-3">
                        <label for="studentID" class= "form-label">School ID</label>
                        <input type="text" name="studentID">
                    </div>

                    <div class = "mb-3">
                        <label for="studentPassword" class = "form-label">Password</label>
                        <input type="text" name = "studentPass">
                    </div>

                    <button type = "submit" class = "btn">Log In</button>
                </form>

            </div>
        </div>
    </div>

<style>

    body{
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    .student h1 {
        margin-top: 30px;
        text-align: center;
    }

    .login {
        padding: 15px;
        border-radius: 15px;
        background-color: white;
    }

    .btn {
        background-color: lightseagreen;
    }
</style>

@endsection