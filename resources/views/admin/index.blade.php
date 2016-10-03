@extends('layouts.admin')
@section('content')
    <div class="wrapper-content">
        <div class="mid">
            <div class="center">
                <div class="admin">
                    <h4>Добрый день, администратор!</h4>
                    <p>Вам доступны такие возможности:</p>
                    <ul class="admin-menu">
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
                </div>
            </div>
        </div>
    </div>
@endsection