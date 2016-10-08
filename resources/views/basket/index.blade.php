@extends('layouts.app')
@section('content')
    <div class="center-cart">
        <div class="cart">
            <h2>Корзина</h2>
            @if (count($orderProducts))
                <div class="products-in-cart">
                    <table class="table-cart">
                        <tr>
                            <th>Название</th>
                            <th>Изображение</th>
                            <th>Стоимость (руб)</th>
                            <th>Количество, шт</th>
                            <th>Итого</th>
                            <th></th>
                        </tr>
                        @foreach ($orderProducts as $product)
                            <tr data-id="{{$product->productId}}">
                                <td>{{$product->name}}</td>
                                <td><img height="50" src="{{$product->img}}"></td>
                                <td>{{$product->price}}</td>
                                <td>
                                    <input type="text" value="{{$product->amount}}"
                                           class="input-total-price">
                                    <button type="button" class="btn btn-plus"><i class="fa fa-plus "></i></button>
                                    <button type="button" class="btn btn-minus"><i class="fa fa-minus "></i>
                                    </button>
                                </td>
                                <td>{{$product->price*$product->amount}} руб.</td>
                                <td>
                                    <span class="btn btn-delete"><i class="fa fa-trash-o fa-lg"></i>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="total-cost"></div>
                    <a class="checkout" href="{{route('checkout.create')}}"><i class="fa fa-credit-card fa-lg"></i>
                        Оформить
                        заказ</a>
                </div>
            @else
                <div class="empty-cart">
                    <span>Корзина пуста!</span>
                </div>
            @endif
        </div>
    </div>
@endsection