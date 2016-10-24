@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Корзина</h2>
            <form action="{{route('checkout.store')}}" method="post" class="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Точка выдачи</label>
                    <select name="checkpoint" class="form-control">
                        @foreach($checkpoints as $checkpoint)
                            <option value="{{$checkpoint->id}}">{!! $checkpoint->name !!}
                                ({!! $checkpoint->address !!})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Метод доставки</label>
                    <select name="delivery"  class="form-control">
                        @foreach($deliveries as $delivery)
                            <option value="{{$delivery->id}}">{!! $delivery->name !!}
                                ({!! $delivery->price !!} руб.)
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Cпособ оплаты</label>
                    <select name="payment"  class="form-control">
                        @foreach($payments as $payment)
                            <option value="{{$payment->id}}">{!! $payment->name !!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-checkout btn-primary">Оформить заказ</button>
                </div>
            </form>
        </div>
    </div>
@endsection
