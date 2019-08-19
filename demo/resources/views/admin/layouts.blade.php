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
    <link href="{{asset('css/datatables.min.css')}}" rel="stylesheet">
    @yield('styles')
</head>
<body>
{{--顶部bar--}}
{{-- Navigation Bar --}}
<nav class="navbar navbar-static-top navbar-default">
    <div class="container">

        <a class="navbar-brand " href="#">{{ config('blog.title') }} 后台</a>
        <button class="navbar-toggle collapse" type="button" data-toggle="collapse" data-target="#navbar-menu">

        </button>
        <div class="collapse navbar-collapse" id="navbar-menu">
            @include('admin.partials.navbar')
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/datatables.min.js')}}"></script>
@yield('scripts')
</body>
</html>