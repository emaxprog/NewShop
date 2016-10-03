@extends('layouts.app')
@section('content')
    <div class="center">
        <div class="cabinet">
            <h3>Редактировать данные</h3>
            <form action="{{route('user.update',$user->id)}}" method="post">{{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <div class="row{{$errors->has('name')?' error':''}}">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" placeholder="Введите имя"
                           value="{{ $user->name }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="row{{$errors->has('surname')?' error':''}}">
                    <label for="surname">Фамилия</label>
                    <input type="text" name="surname" id="surname" placeholder="Введите фамилию"
                           value="{{ $user->surname }}">
                    @if ($errors->has('surname'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="row{{$errors->has('phone')?' error':''}}">
                    <label for="phone">Телефон</label>
                    <input type="text" name="phone" id="phone" placeholder="Введите телефон"
                           value="{{ $user->phone }}">
                    @if ($errors->has('phone'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="row{{$errors->has('address')?' error':''}}">
                    <label for="address">Адрес</label>
                    <input type="text" name="address" id="address" placeholder="Введите адрес"
                           value="{{ $user->address }}">
                    @if ($errors->has('address'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="btn">
                    <button type="submit" class="btn btn-reg"> Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection