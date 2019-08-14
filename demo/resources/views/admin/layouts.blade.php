<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('blog.title')}} 后台管理</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    @yield('styles')
</head>
<body>
{{--顶部bar--}}
<nav class="navbar navbar-laravel"></nav>
</body>
</html>