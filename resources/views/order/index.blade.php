@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Управление заказами</h2>
            @if(!count($orders))
                <div>
                    <p>Заказы отсутствуют</p>
                </div>
            @else
                <h4>Список заказов</h4>
                <table class="table table-stripes">
                    <thead>
                    <tr>
                        <th>Дата оформления</th>
                        <th>Способ доставки</th>
                        <th>Способ оплаты</th>
                        <th>Статус</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr data-id="{{$order->id}}">
                            <td>{!! $order->created_at !!}</td>
                            <td>{!! $order->delivery->name !!}</td>
                            <td>{!! $order->payment->name !!}</td>
                            <td>{!! $order->status->name !!}</td>
                            <td><a href="{{route('admin.order.show',['id'=>$order->id])}}" class="btn btn-success"
                                   title="Смотреть"><i
                                            class="fa fa-eye fa-lg"></i></a></td>
                            <td><a href="{{route('admin.order.edit',['id'=>$order->id])}}" class="btn btn-info"
                                   title="Редактировать"><i
                                            class="fa fa-edit fa-lg"></i></a></td>
                            <td>
                                <button class="btn btn-danger delete-order" data-id="{{$order->id}}"><i
                                            class="fa fa-trash-o fa-lg"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection