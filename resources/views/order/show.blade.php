@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin-view">
            <h2 class="text-center">Просмотр заказа #{!! $order->id !!}</h2>
            <h3>Информация о клиенте</h3>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td>Имя клиента</td>
                    <td>{!! $user->name !!}</td>
                </tr>
                <tr>
                    <td>Телефон клиента</td>
                    <td>{!! $user->phone !!}</td>
                </tr>
                <tr>
                    <td>Страна клиента</td>
                    <td>{!! $user->city->region->country->name !!}</td>
                </tr>
                <tr>
                    <td>Регион клиента</td>
                    <td>{!! $user->city->region->name !!}</td>
                </tr>
                <tr>
                    <td>Город клиента</td>
                    <td>{!! $user->city->name !!}</td>
                </tr>
                <tr>
                    <td>Адрес клиента</td>
                    <td>{!! $user->address !!}</td>
                </tr>
                </tbody>
            </table>
            <h3>Информация о заказе</h3>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td>Дата заказа</td>
                    <td>{!! $order->created_at !!}</td>
                </tr>
                <tr>
                    <td>Способ доставки</td>
                    <td>{!! $order->delivery->name !!}</td>
                </tr>
                <tr>
                    <td>Способ оплаты</td>
                    <td>{!! $order->payment->name !!}</td>
                </tr>
                <tr>
                    <td>Статус заказа</td>
                    <td>{!! $order->status->name !!}</td>
                </tr>
                <tr>
                    <td>Комментарий к заказу</td>
                    <td>{!! $order->сomment !!}</td>
                </tr>
                </tbody>
            </table>
            <h3>Товары в заказе</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Артикул товара</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{!! $product->code !!}</td>
                        <td>{!! $product->name !!}</td>
                        <td>{!! $product->price !!} руб.</td>
                        <td>{!! $product->pivot->amount !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <h2>Общая стоимость: {!! $totalPrice !!} руб.</h2>
            <a href="{{route('admin.order.index')}}" class="btn-back btn btn-primary"><i class="fa fa-arrow-left"></i>
                Назад</a>
        </div>
    </div>
@endsection