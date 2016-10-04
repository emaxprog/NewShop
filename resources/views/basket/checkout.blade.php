@extends('layouts.app')
@section('content')
    <div class="center-cart">
        <div class="cart">
            <h2>Корзина</h2>
            <div class="checkout">
                <form action="{{route('checkout.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <label>Точка выдачи</label>
                        <select name="checkpoint">
                            @foreach($checkpoints as $checkpoint)
                                <option value="{{$checkpoint->id}}">{!! $checkpoint->name !!}
                                    ({!! $checkpoint->address !!})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <label>Метод доставки</label>
                        <select name="delivery">
                            @foreach($deliveries as $delivery)
                                <option value="{{$delivery->id}}">{!! $delivery->name !!}
                                    ({!! $delivery->price !!} руб.)
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <label>Cпособ оплаты</label>
                        <select name="payment">
                            @foreach($payments as $payment)
                                <option value="{{$payment->id}}">{!! $payment->name !!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-checkout">Оформить заказ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
