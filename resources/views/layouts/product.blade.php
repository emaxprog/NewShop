<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Интернет-магазин</title>
    <link rel="icon" type="image/x-icon" href="/upload/logotype/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/template/styles/font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/template/styles/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/template/styles/css/product/styles.css">
    <script rel="script" type="text/javascript" src="/template/js/jQuery/jquery-3.1.1.min.js"></script>
    <script rel="script" type="text/javascript" src="/template/js/jQuery/jquery.cookie.js"></script>
    <link rel="stylesheet" type="text/css" href="/template/js/jquery-ui-1.12.0.custom/jquery-ui.css">
    <script rel="script" type="text/javascript" src="/template/js/jquery-ui-1.12.0.custom/jquery-ui.min.js"></script>
    <script rel="script" type="text/javascript" src="/template/js/fixed_menu.min.js"></script>
    <script rel="script" type="text/javascript" src="/template/js/fixed_hover.min.js"></script>
    <script rel="script" type="text/javascript" src="/template/js/image-gallery-slider/js/jssor.slider-21.1.5.mini.js"></script>
    <script rel="script" type="text/javascript" src="/template/js/image-gallery-slider/image_gallery_slider.js"></script>
    <link rel="stylesheet" type="text/css" href="/template/js/image-gallery-slider/image_gallery_slider.css">
    <script rel="script" type="text/javascript" src="/template/js/functions.min.js"></script>
</head>
<body>
<div class="wrapper-header">
    <div class="mid">
        <header class="header">
            <div class="logotype">
                <img src="/template/images/site/logotype.png" alt="Логотип" title="Логотип">
            </div>
            <div class="contacts">
                <ul>
                    <li>
                        <i class="fa fa-phone fa-lg"></i>
                    </li>
                    <li>
                        <i class="fa fa-phone fa-lg"></i>
                    </li>
                </ul>
            </div>
            <div class="authorization">
                <ul>
                    @if(Auth::guest())
                        <li>
                            <a href="{{url('/login')}}"><i class="fa fa-lock fa-lg"></i> Войти</a>
                        </li>
                        <li>
                            <a href="{{url('/register')}}"><i class="fa fa-key fa-lg"></i> Регистрация</a>
                        </li>
                    @else
                        <li>
                            <a href="{{url('/cabinet')}}"><i class="fa fa-user fa-lg"></i> Личный кабинет</a>
                        </li>
                        <li>
                            <a href="{{url('/logout')}}"><i class="fa fa-unlock fa-lg"></i> Выйти</a>
                        </li>
                    @endif
                    <li>
                        <a href="{{route('basket')}}"><i class="fa fa-shopping-cart fa-lg"></i> Корзина(<span
                                    class="count-products"></span>)</a>
                    </li>
                </ul>
            </div>
        </header>
    </div>
</div>
<div id="fixed"></div>
<div class="wrapper-menu">
    <div class="mid">
        <nav class="menu">
            <ul>
                <li>
                    <a href="/">Главная</a>
                </li>
                <li>
                    <a href="/about">О компании</a>
                </li>
                <li>
                    <a href="/guarantee">Гарантия</a>
                </li>
                <li>
                    <a href="">Контакты</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<div class="wrapper-content">
    <div class="mid">
        @yield('content')
    </div>
</div>
<div class="wrapper-footer">
    <div class="mid">
        <footer class="footer">
            <div class="f-container">
                <div class="f-nav">
                    <h2>Навигация</h2>
                    <nav class="f-menu">
                        <ul>
                            <li>
                                <a href="index.php">Главная</a>
                            </li>
                            <li>
                                <a href="about.php">О компании</a>
                            </li>
                            <li>
                                <a href="guarantee.php">Гарантия</a>
                            </li>
                            <li>
                                <a href="contacts.php">Контакты</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="f-payment-methods">
                    <h2>Способы оплаты</h2>
                    <div class="payment-methods-img">
                        <img src="/template/images/site/oplata_icon.png" alt="Способы оплаты"
                             title="Способы оплаты">
                    </div>
                </div>
                <div class="f-contacts">
                    <h2>Контакты</h2>
                    <ul>
                        <li>Тел: 8(900)000-00-00</li>
                        <li>Адрес:</li>
                    </ul>
                </div>
            </div>
            <div class="copy">
                <span>2016 &copy; Интернет-магазин EmStorm</span>
            </div>
        </footer>
    </div>
</div>
</body>
</html>