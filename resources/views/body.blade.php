<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>

    <meta name="CSRF_TOKEN" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.6/dist/semantic.min.css">
    <script src="https://kit.fontawesome.com/1dcb22295f.js" crossorigin="anonymous"></script>
    @toastr_css
</head>
<body style="background-color: #2d3748">
@include('parts.nav')
<br>
<div class="ui grid">
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.6/dist/semantic.min.js"></script>
<script>
    $('.ui.dropdown').dropdown();
</script>
@yield('scripts')

@jquery
@toastr_js
@toastr_render

</body>
</html>
