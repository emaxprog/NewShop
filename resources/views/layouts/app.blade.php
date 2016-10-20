<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Интернет-магазин</title>
    <link rel="icon" type="image/x-icon" href="{{$header->favicon}}">
    <link rel="stylesheet" type="text/css" href="/template/styles/font-awesome-4.6.3/css/font-awesome.min.css">
    {{--<link rel="stylesheet" type="text/css" href="/template/styles/css/styles.css">--}}
    <script rel="script" type="text/javascript" src="/template/js/jQuery/jquery-3.1.1.min.js"></script>
    <script rel="script" type="text/javascript" src="/template/js/jQuery/jquery.cookie.js"></script>
    {{--<link rel="stylesheet" type="text/css" href="/template/js/jquery-ui-1.12.0.custom/jquery-ui.css">--}}
    <script rel="script" type="text/javascript" src="/template/js/jquery-ui-1.12.0.custom/jquery-ui.min.js"></script>
    <script rel="script" type="text/javascript" src="/template/js/fixed_menu.min.js"></script>
    <script rel="script" type="text/javascript" src="/template/js/fixed_hover.min.js"></script>
    <script rel="script" type="text/javascript" src="/template/js/menu-select.min.js"></script>
    <script rel="script" type="text/javascript" src="/template/js/feedback.min.js"></script>
    <script rel="script" type="text/javascript" src="/template/js/functions.js"></script>

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <script rel="script" type="text/javascript" src="/assets/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/styles/css/styles.css">

    <div></div>
    @if(isset($params))
        <script rel="script" type="text/javascript"
                src="/template/js/image-gallery-slider/js/jssor.slider-21.1.5.mini.js"></script>
        <script rel="script" type="text/javascript"
                src="/template/js/image-gallery-slider/image_gallery_slider.js"></script>
        <link rel="stylesheet" type="text/css" href="/template/js/image-gallery-slider/image_gallery_slider.css">
        {{--<link rel="stylesheet" type="text/css" href="/template/styles/css/product/styles.css">--}}
    @else
        <script rel="script" type="text/javascript" src="/template/js/slider/js/jssor.slider-21.1.5.mini.js"></script>
        <script rel="script" type="text/javascript" src="/template/js/slider/slider.js"></script>
        <link rel="stylesheet" type="text/css" href="/template/js/slider/slider.css">
    @endif
</head>
<body>
<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}">EmStorm</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="">О компании</a>
                </li>
                <li>
                    {{--@include('layouts.popup')--}}
                </li>
                <li>
                    <a href="">Гарантия</a>
                </li>
            </ul>
            <p class="navbar-text"><i class="fa fa-phone fa-lg"></i> {!! $header->phone1 !!}</p>
            <p class="navbar-text"><i class="fa fa-phone fa-lg"></i> {!! $header->phone2 !!}</p>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::guest())
                    <li>
                        <a href="{{url('/login')}}"><i class="fa fa-lock fa-lg"></i> Войти</a>
                    </li>
                    <li>
                        <a href="{{url('/register')}}"><i class="fa fa-key fa-lg"></i> Регистрация</a>
                    </li>
                @else
                    <li>
                        <a href="{{route('user.index')}}"><i class="fa fa-user fa-lg"></i> Личный кабинет</a>
                    </li>
                    <li>
                        <a href="{{url('/logout')}}"><i class="fa fa-unlock fa-lg"></i> Выйти</a>
                    </li>
                @endif
                <li>
                    <a href="{{route('basket')}}"><i class="fa fa-shopping-cart fa-lg"></i> Корзина <span
                                class="count-products"></span></a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container">
    @yield('content')
</div>
{{--<div class="wrapper-footer">--}}
    {{--<div class="mid">--}}
        {{--<footer class="footer">--}}
            {{--<div class="f-container">--}}
                {{--<div class="f-nav">--}}
                    {{--<h2>Навигация</h2>--}}
                    {{--<nav class="f-menu">--}}
                        {{--<ul>--}}
                            {{--<li>--}}
                                {{--<a href="index.php">Главная</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="about.php">О компании</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--@include('layouts.popup')--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="guarantee.php">Гарантия</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="contacts.php">Контакты</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</nav>--}}
                {{--</div>--}}
                {{--<div class="f-payment-methods">--}}
                    {{--<h2>Способы оплаты</h2>--}}
                    {{--<div class="payment-methods-img">--}}
                        {{--<img src="/template/images/site/oplata_icon.png" alt="Способы оплаты"--}}
                             {{--title="Способы оплаты">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="f-contacts">--}}
                    {{--<h2>Контакты</h2>--}}
                    {{--<ul>--}}
                        {{--<li><i class="fa fa-phone fa-lg"></i> {!! $header->phone1 !!}</li>--}}
                        {{--<li><i class="fa fa-map-marker fa-lg"></i> {!! $header->address !!}</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="copy">--}}
                {{--<span>2016 &copy; Интернет-магазин EmStorm</span>--}}
            {{--</div>--}}
        {{--</footer>--}}
    {{--</div>--}}
{{--</div>--}}
</body>
</html>