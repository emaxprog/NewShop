@extends('layouts.app')
@section('content')
    <div class="center-cart">
        <div class="cart">
            <h2>Ваш заказ оформлен!</h2>
            <div class="products-in-cart">
                <table class="table-cart">
                    <tr>
                        <th>Название</th>
                        <th>Изображение</th>
                        <th>Стоимость (руб)</th>
                        <th>Количество, шт</th>
                        <th>Итого</th>
                    </tr>
                    @foreach ($orderProducts as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td><img height="50" src="{{$product->img}}"></td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->amount}}</td>
                            <td>{{$product->price*$product->amount}} руб.</td>
                        </tr>
                    @endforeach
                </table>
                <h2>Общая стоимость с доставкой: {{$totalCost}} руб.</h2>
                <a href="{{route('home')}}">На главную</a>
            </div>
        </div>
    </div>
@endsection