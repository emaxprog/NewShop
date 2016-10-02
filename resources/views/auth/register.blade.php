@extends('layouts.app')

@section('content')
    <div class="container-form">
        <div class="login">
            <div class="registration-form form">
                <h2>Регистрация</h2>
                <form action="{{url('/register')}}" method="post">{{csrf_field()}}
                    <div class="row{{$errors->has('email')?' error':''}}">
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" id="email" placeholder="Введите Email"
                               value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row{{$errors->has('password')?' error':''}}">
                        <label for="password">Пароль:</label>
                        <input type="password" name="password" id="password" placeholder="Введите пароль">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row{{$errors->has('password_confirmation')?' error':''}}">
                        <label for="password_confirmation">Подтвердите пароль</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               placeholder="Подтвердите пароль">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row{{$errors->has('name')?' error':''}}">
                        <label for="name">Имя</label>
                        <input type="text" name="name" id="name" placeholder="Введите имя"
                               value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row{{$errors->has('surname')?' error':''}}">
                        <label for="surname">Фамилия</label>
                        <input type="text" name="surname" id="surname" placeholder="Введите фамилию"
                               value="{{ old('surname') }}">
                        @if ($errors->has('surname'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row{{$errors->has('phone')?' error':''}}">
                        <label for="phone">Телефон</label>
                        <input type="text" name="phone" id="phone" placeholder="Введите телефон"
                               value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row{{$errors->has('address')?' error':''}}">
                        <label for="address">Адрес</label>
                        <input type="text" name="address" id="address" placeholder="Введите адрес"
                               value="{{ old('address') }}">
                        @if ($errors->has('address'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="btn">
                        <button type="submit" class="btn btn-reg"><i class="fa fa-btn fa-user"></i> Регистрация</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
