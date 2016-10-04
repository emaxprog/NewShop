@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin">
            <h2>Список заказов</h2>
            @if(!count($orders))
                <div>
                    <p>Заказы отсутствуют</p>
                </div>
            @else
                <table class="table-orders">
                    <tr>
                        <th>Дата оформления</th>
                        <th>Точка выдачи</th>
                        <th>Способ доставки</th>
                        <th>Способ оплаты</th>
                        <th>Статус</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($orders as $order)
                        <tr data-id="{{$order->id}}">
                            <td>{!! $order->created_at !!}</td>
                            <td>{!! $order->checkpoint_id !!}</td>
                            <td>{!! $order->delivery_id !!}</td>
                            <td>{!! $order->payment_id !!}</td>
                            <td>{!! $order->status !!}</td>
                            <td><a href="{{route('admin.order.show',['id'=>$order->id])}}" title="Смотреть"><i
                                            class="fa fa-eye fa-lg"></i></a></td>
                            <td><a href="{{route('admin.order.edit',['id'=>$order->id])}}" title="Редактировать"><i
                                            class="fa fa-edit fa-lg"></i></a></td>
                            <td><span class="delete delete-order"><i class="fa fa-trash-o fa-lg"></i></span></td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection