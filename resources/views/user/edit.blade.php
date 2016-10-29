@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Редактировать данные</h3>
            <form action="{{route('user.update',$user->id)}}" method="post"
                  class="form form-horizontal">{{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="name" class="control-label col-md-2">Имя</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя"
                               value="{{ $user->name }}">
                        @if ($errors->has('name'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="surname" class="control-label col-md-2">Фамилия</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="surname" id="surname"
                               placeholder="Введите фамилию"
                               value="{{ $user->surname }}">
                        @if ($errors->has('surname'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('surname') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="control-label col-md-2">Телефон</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Введите телефон"
                               value="{{ $user->phone }}">
                        @if ($errors->has('phone'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Страна</label>
                    <div class="col-md-9">
                        <select name="country" class="form-control" id="country">
                            @foreach($countries as $country)
                                <option value="{{$country->id}}"
                                        @if($country->id==$user->city->region->country_id) selected @endif>
                                    {!! $country->name !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Регион</label>
                    <div class="col-md-9">
                        <select name="region" class="form-control" id="region">
                            @foreach($regions as $region)
                                <option value="{{$region->id}}"
                                        @if($region->id==$user->city->region_id) selected @endif>
                                    {!! $region->name !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Город</label>
                    <div class="col-md-9">
                        <select name="city" class="form-control" id="city">
                            @foreach($cities as $city)
                                <option value="{{$city->id}}"
                                        @if($city->id==$user->city_id) selected @endif>
                                    {!! $city->name !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="control-label col-md-2">Адрес</label>
                    <div class="col-md-9">
                        <input type="text" name="address" class="form-control" value="{{$user->address}}"
                               placeholder="Пример: ул.Шолохова 156а" id="address">
                        @if($errors->has('address'))
                            <div class="alert alert-danger">
                                <strong>{!! $errors->first('address') !!}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="postcode" class="control-label col-md-2">Почтовый индекс</label>
                    <div class="col-md-9">
                        <input type="text" name="postcode" placeholder="Пример:346422" class="form-control"
                               value="{{$user->postcode}}" id="postcode">
                        @if($errors->has('postcode'))
                            <div class="alert alert-danger">
                                <strong>{!! $errors->first('postcode') !!}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-save-user btn-primary center-block"> Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection