<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" id="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{$header->favicon}}">
    <title>Интернет-магазин</title>
    <link rel="icon" type="image/x-icon" href="/upload/logotype/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/template/styles/font-awesome-4.6.3/css/font-awesome.min.css">
    {{--<link rel="stylesheet" type="text/css" href="/template/styles/css/styles.css">--}}
    <script rel="script" type="text/javascript" src="/template/js/jQuery/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/template/js/jquery-ui-1.12.0.custom/jquery-ui.css">
    <script rel="script" type="text/javascript" src="/template/js/jquery-ui-1.12.0.custom/jquery-ui.min.js"></script>
    {{--<script rel="script" type="text/javascript" src="/template/js/uploadProducts.js"></script>--}}
    <script rel="script" type="text/javascript" src="/template/js/functions.js"></script>


    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <script rel="script" type="text/javascript" src="/assets/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/styles/css/styles.css">
</head>
<body>
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('admin.product.index')}}">EmStorm</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('admin.product.index')}}"><i class="fa fa-gamepad fa-lg"></i> Управление
                            товарами</a>
                    </li>
                    <li><a href="{{route('admin.category.index')}}"><i class="fa fa-gamepad fa-lg"></i> Управление
                            категориями</a>
                    </li>
                    <li><a href="{{route('admin.order.index')}}"><i class="fa fa-gamepad fa-lg"></i> Управление
                            заказами</a></li>
                    <li><a href="{{route('admin.afisha.edit')}}"><i class="fa fa-gamepad fa-lg"></i> Управление
                            афишей</a></li>
                    <li><a href="{{route('admin.header.edit')}}"><i class="fa fa-gamepad fa-lg"></i> Управление
                            шапкой</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out fa-lg"></i> На сайт</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
<div class="content">
    <div class="container">
        @yield('content')
    </div>
</div>
<footer>
</footer>
</body>
</html>