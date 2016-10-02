@extends('layouts.app')

@section('content')
    <div class="container-form">
        <div class="login">
            <div class="registration-form form">
                <form action="{{url('/password/reset')}}" method="post">{{csrf_field()}}
                    <div class="row{{$errors->has('email')?' error':''}}">
                        <label for="email">E-Mail</label><br>
                        <input type="email" name="email" id="email" placeholder="Введите Email"
                               value="{{ old('email') }}"><br>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row{{$errors->has('password')?' error':''}}">
                        <label for="password">Пароль:</label><br>
                        <input type="password" name="password" id="password" placeholder="Введите пароль"><br>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row{{$errors->has('password_confirmation')?' error':''}}">
                        <label for="password_confirmation">E-Mail</label><br>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               placeholder="Подтвердите пароль"><br>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-refresh"></i> Сбросить пароль
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
