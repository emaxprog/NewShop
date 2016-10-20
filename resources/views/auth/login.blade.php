@extends('layouts.app')

@section('content')
    <div class="container-form">
        <div class="login">
            <div class="registration-form form">
                <h2>Вход</h2>
                <form action="{{url('/login')}}" method="post">
                    {{csrf_field()}}
                    <div class="row{{$errors->has('email')?' error':''}}">
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Введите Email"
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
                    <div class="btn">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i> Вход
                        </button>
                        <div>
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Забыли пароль?</a>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Запомнить меня
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
