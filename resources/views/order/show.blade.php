@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin-view">
            <h2>Просмотр заказа #{!! $order->id !!}</h2>
            <h3>Информация о клиенте</h3>
            <table class="table-client-info">
                <tr>
                    <td>Имя клиента</td>
                    <td>{!! $customer->name !!}</td>
                </tr>
                <tr>
                    <td>Телефон клиента</td>
                    <td>{!! $customer->phone !!}</td>
                </tr>
                <tr>
                    <td>Адрес клиента</td>
                    <td>{!! $customer->address !!}</td>
                </tr>
            </table>
            <h3>Информация о заказе</h3>
            <table class="table-orders-info">
                <tr>
                    <td>Дата заказа</td>
                    <td>{!! $order->created_at !!}</td>
                </tr>
                <tr>
                    <td>Точка выдачи</td>
                    <td>{!! $order->checkpoint_id !!}</td>
                </tr>
                <tr>
                    <td>Способ доставки</td>
                    <td>{!! $order->delivery_id !!}</td>
                </tr>
                <tr>
                    <td>Способ оплаты</td>
                    <td>{!! $order->payment_id !!}</td>
                </tr>
                <tr>
                    <td>Статус заказа</td>
                    <td>{!! $order->status !!}</td>
                </tr>

            </table>
            <h3>Товары в заказе</h3>
            <table class="table-products-orders">
                <tr>
                    <th>Артикул товара</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <td>{!! $product->code !!}</td>
                        <td>{!! $product->name !!}</td>
                        <td>{!! $product->price !!} руб.</td>
                        <td>{!! $product->pivot->amount !!}</td>
                    </tr>
                @endforeach
            </table>
            <a href="{{route('admin.order.index')}}" class="btn-back"><i class="fa fa-arrow-left"></i> Назад</a>
        </div>
    </div>
@endsection