<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    @include('common.navigation')
    <div class="my-3">
        @yield('content')
    </div>
</body>
</html>

<style>
    .navbar{
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 24px; 
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    .navbar .logo{
        font-weight: bold;
        font-size: 20px;
        text-decoration: none;
        color: black;
    }

    .nav-pills{
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
        gap: 24px;
        flex: 1;
        justify-content: center;
    }

    .nav-link{
        text-decoration: none;
        padding: 8px 16px;
    }

    .logout-btn{
        background-color: lightskyblue;
        color: white;
        border: none;
        border-radius: 10px;
        padding: 8px 16px;
        font-weight: 600;
    }
</style>