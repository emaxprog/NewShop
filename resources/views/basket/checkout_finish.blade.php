@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Ваш заказ оформлен!</h2>
            <table class="table-cart table">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Изображение</th>
                    <th>Стоимость (руб)</th>
                    <th>Количество, шт</th>
                    <th>Итого</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orderProducts as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td><img height="50" src="{{$product->img}}" class="img-rounded"></td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->amount}}</td>
                        <td>{{$product->price*$product->amount}} руб.</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <h2>Общая стоимость с доставкой: {{$totalCost}} руб.</h2>
            <div class="btn-to-main">
                <a href="{{route('home')}}" class="btn-to-main btn btn-primary">На главную</a>
            </div>
        </div>
    </div>
@endsection