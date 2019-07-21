<!DOCTYPE html>
<html lang="en">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title',config('app.name'))</title>
    @include('admin.layouts.partials.head')
    @yield('head')
</head>




    @include('admin.layouts.partials.sidebar')
    @yield('content')
    @include('admin.layouts.partials.footer')



    @yield('footer')



