<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title',config('app.name'))</title>
    @include('layouts.partials.head')
    @yield('head')
</head>




    @include('layouts.partials.navbar')
    @yield('content')
    @include('layouts.partials.footer')



    @yield('footer')


</html>
