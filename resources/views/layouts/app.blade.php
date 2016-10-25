<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Интернет-магазин</title>
    <link rel="icon" type="image/x-icon" href="{{$header->favicon}}">
    <link rel="stylesheet" type="text/css" href="/template/styles/font-awesome-4.6.3/css/font-awesome.min.css">
    {{--<link rel="stylesheet" type="text/css" href="/template/styles/css/styles.css">--}}
    <script rel="script" type="text/javascript" src="/template/js/jQuery/jquery-3.1.1.min.js"></script>
    <script rel="script" type="text/javascript" src="/template/js/jQuery/jquery.cookie.js"></script>
    <link rel="stylesheet" type="text/css" href="/template/js/jquery-ui-1.12.0.custom/jquery-ui.css">
    <script rel="script" type="text/javascript" src="/template/js/jquery-ui-1.12.0.custom/jquery-ui.min.js"></script>
    {{--<script rel="script" type="text/javascript" src="/template/js/fixed_menu.min.js"></script>--}}
    {{--<script rel="script" type="text/javascript" src="/template/js/fixed_hover.min.js"></script>--}}
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
<header>
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
                        <a href="#">О компании</a>
                    </li>
                    <li>
                        <a href="" onclick="return false" data-toggle="modal" data-target="#popup">Обратная связь</a>
                    </li>
                    <li>
                        <a href="#">Гарантия</a>
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
                                    class="count-products badge"></span></a>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</header>
<div class="content">
    <div class="container">
        @yield('content')
    </div>
</div>
<footer class="panel-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Навигация</h2>
                <nav>
                    <ul class="nav">
                        <li>
                            <a href="{{route('home')}}">Главная</a>
                        </li>
                        <li>
                            <a href="">О компании</a>
                        </li>
                        <li>
                            <a href="" onclick="return false" data-toggle="modal" data-target="#popup">Обратная связь</a>
                        </li>
                        <li>
                            <a href="">Гарантия</a>
                        </li>

                    </ul>
                </nav>
            </div>
            <div class="col-md-4">
                <h2>Способы оплаты</h2>
                <div class="payment-methods-img">
                    <img src="/template/images/site/oplata_icon.png" alt="Способы оплаты"
                         title="Способы оплаты">
                </div>
            </div>
            <div class="col-md-4">
                <h2>Контакты</h2>
                <ul>
                    <li><i class="fa fa-phone fa-lg"></i> {!! $header->phone1 !!}</li>
                    <li><i class="fa fa-map-marker fa-lg"></i> {!! $header->address !!}</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <span>2016 &copy; Интернет-магазин EmStorm</span>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade" role="dialog" aria-hidden="true" id="popup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" aria-hidden="true" data-dismiss="modal">&times;</button>
                <h2>Обратная связь</h2>
            </div>
            <div class="modal-body">
                <form name="contact" id="feedback-form" method="post" class="form" action="/feedback"
                      onsubmit="return false">
                    <div class="form-group">
                        <label for="name">Ваше имя</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Введите имя"
                               tabindex="1">
                        <div class="text-danger error-name"></div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Введите телефон"
                               tabindex="2">
                        <div class="text-danger error-phone"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Введите Email"
                               tabindex="3">
                        <div class="text-danger error-email"></div>
                    </div>
                    <div class="form-group">
                        <label for="message">Сообщение</label>
                        <textarea name="message" id="message" rows="5" class="form-control" placeholder="Введите сообщение"
                                  tabindex="4"></textarea>
                        <div class="text-danger error-message"></div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name="submitbtn" class="btn btn-primary" id="feedback-btn">Отправить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>