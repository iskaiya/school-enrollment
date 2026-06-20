<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    @include('common.header')
    <div class = my-3>
        @yield('content')
    </div>
    @include('common.footer')

<style>

    .body{
        background-color: #ffffff;
    }

</style>

</body>
</html>