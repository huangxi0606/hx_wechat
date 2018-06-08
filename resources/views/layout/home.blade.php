<!DOCTYPE html>
<html lang="zh-en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <style>
        a{
            text-decoration: none !important;
        }
    </style>
    @section('css')
    @show
</head>
<body>

<!-- 头部及导航 start-->
{{--<div class="top">--}}
    {{--<p class="title"><i class="menu glyphicon glyphicon-th-large"></i>@yield('header')</p>--}}
    {{--@section('logo')--}}
    {{--<img src="/home/images/logo.jpg" alt="" style="width: 100%;">--}}
    {{--@show--}}
{{--</div>--}}
<!-- 头部及导航 end-->

@section('content')
@show
<script src="{{asset('js/jquery.min.js?v=2.1.4')}}"></script>
<script src="{{asset('js/bootstrap.min.js?v=3.3.6')}}"></script>
@section('js')
@show

</body>
</html>