@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Корзина</h2>
            @if (count($orderProducts))
                <table class="table">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Изображение</th>
                        <th>Стоимость (руб)</th>
                        <th>Количество, шт</th>
                        <th>Итого</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orderProducts as $product)
                        <tr data-id="{{$product->productId}}">
                            <td>{{$product->name}}</td>
                            <td><img height="50" src="{{$product->img}}" class="img-rounded"></td>
                            <td>{{$product->price}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" value="{{$product->amount}}"
                                               class="input-total-price form-control"
                                               data-id="{{$product->productId}}" data-price="{{$product->price}}">
                                    </div>
                                    <button type="button" class="btn btn-plus btn-default"
                                            data-id="{{$product->productId}}"><i
                                                class="fa fa-plus"></i></button>
                                    <button type="button" class="btn btn-minus btn-default"
                                            data-id="{{$product->productId}}"><i
                                                class="fa fa-minus "></i>
                                    </button>
                                </div>
                            </td>
                            <td class="total-price">{{$product->price*$product->amount}} руб.</td>
                            <td>
                                <button type="button" class="btn btn-delete btn-danger"><i
                                            class="fa fa-trash-o fa-lg"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="total-cost"></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a class="checkout btn btn-primary" href="{{route('checkout.create')}}"><i
                                    class="fa fa-credit-card fa-lg"></i>Оформитьзаказ</a>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <span>Корзина пуста!</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection