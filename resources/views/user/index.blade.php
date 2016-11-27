@extends('layouts.app')
@section('content')
    <div class="row">
        <h2>Кабинет пользователя</h2>
        <h3>Привет, {!! $user->name !!}</h3>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="{{route('user.edit',$user->id)}}"><i class="fa fa-edit fa-lg"></i> Редактировать данные</a>
            </li>
            <li><a href="{{route('basket')}}"><i class="fa fa-shopping-cart fa-lg"></i> Перейти в корзину</a></li>
            <!--<li><a href="/cabinet/history">Список покупок</a></li>-->
        </ul>
    </div>
@endsection