<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>

    <meta name="CSRF_TOKEN" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{mix('css/semantic.css')}}">
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

<script>
    $.fn.api.settings.api = {
        'get userpage' : '/ajax/user/get_scores/{id}',
    };
    $('.ui.dropdown').dropdown();
</script>
@jquery
@toastr_js
@toastr_render
<script src="{{mix('js/app.js')}}"></script>
<script src="{{mix('js/semantic.js')}}"></script>
@yield('scripts')



</body>
</html>
