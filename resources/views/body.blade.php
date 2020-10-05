<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>

    <meta name="CSRF_TOKEN" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.7/dist/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">
    <script src="https://kit.fontawesome.com/1dcb22295f.js" crossorigin="anonymous"></script>
    @toastr_css
</head>
<body style="background-color: #2d3748; background-image: url('http://olekolek1000.com:60001/background.png')" >
@include('parts.nav')
<br>
<div class="ui grid">
    @yield('content')
</div>

@jquery
@toastr_js
@toastr_render
<script src="{{mix('js/core/main.js')}}"></script>
<script src="{{mix('js/semantic.js')}}"></script>
@yield('scripts')



</body>
</html>
