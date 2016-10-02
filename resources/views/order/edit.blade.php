@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin">
            <h2>Редактировать заказ #{!! $order->id !!}</h2>
            <div class="login-form">
                <form action="{{route('admin.order.update',['id'=>$order->id])}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                    <label>Статус</label><br>
                    <select name="status">
                        <option value="1" @if($order->status==1) selected @endif>Новый заказ
                        </option>
                        <option value="2" @if($order->status==2) selected @endif>В обработке
                        </option>
                        <option value="3" @if($order->status==3) selected @endif>Доставляется
                        </option>
                        <option value="4" @if($order->status==4) selected @endif>Закрыт
                        </option>
                    </select>
                    <br>
                    <input type="submit" class="btn btn-default" value="Сохранить"><br>
                </form>
            </div>
        </div>
    </div>
@endsection