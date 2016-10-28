@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Оформление заказа</h2>
            <form action="{{route('order.store')}}" method="post" class="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Страна</label>
                    <select name="country" class="form-control" id="country">
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{!! $country->name !!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Регион</label>
                    <select name="region" class="form-control" id="region">
                        @foreach($regions as $region)
                            <option value="{{$region->id}}">{!! $region->name !!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Город</label>
                    <select name="city" class="form-control" id="city">
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{!! $city->name !!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Точка выдачи</label>
                    <select name="checkpoint" class="form-control" id="checkpoint">
                        @foreach($checkpoints as $checkpoint)
                            <option value="{{$checkpoint->id}}">{!! $checkpoint->name !!}
                                ({!! $checkpoint->street !!} {!! $checkpoint->num_home !!})
                            </option>
                        @endforeach
                    </select>
                </div>

                /*В точку выдачи*/
                {{--<div class="form-group">--}}
                {{--<div class="row">--}}
                {{--<div class="col-md-6">--}}
                {{--<label>Улица</label>--}}
                {{--<input type="text" name="street" class="form-control" value="{{old('street')}}"--}}
                {{--placeholder="Пример: Шолохова">--}}
                {{--</div>--}}
                {{--<div class="col-md-2">--}}
                {{--<label>Номер дома</label>--}}
                {{--<input type="text" name="num_home" class="form-control" value="{{old('num_home')}}"--}}
                {{--placeholder="Пример: 45А">--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
                {{--<label>Почтовый индекс</label>--}}
                {{--<input type="text" name="mail_index" class="form-control" value="{{old('mail_index')}}"--}}
                {{--placeholder="Пример: 342423">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--@if(count($errors)>0)--}}
                {{--@foreach($errors->all() as $error)--}}
                {{--<div class="alert alert-danger">--}}
                {{--<strong>{!! $error !!}</strong>--}}
                {{--</div>--}}
                {{--@endforeach--}}
                {{--@endif--}}
                {{--</div>--}}

                /**/

                <div class="form-group">
                    <label>Тип доставки</label>
                    <select name="delivery" class="form-control">
                        @foreach($deliveries as $delivery)
                            <option value="{{$delivery->id}}">{!! $delivery->name !!}
                                ({!! $delivery->price !!} руб.)
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Cпособ оплаты</label>
                    <select name="payment" class="form-control">
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
