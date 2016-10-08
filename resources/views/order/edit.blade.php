@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin">
            <h2>Редактировать заказ #{!! $order->id !!}</h2>
            <div class="admin-form">
                <form action="{{route('admin.order.update',['id'=>$order->id])}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <label>Статус</label>
                    </div>
                    <div class="row">
                        <select name="status">
                            @foreach($statusList as $status)
                                <option value="{{$status->id}}"
                                        @if($order->status_id==$status->id) selected @endif>{!! $status->name !!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <input type="submit" class="btn btn-default" value="Сохранить">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection