@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form form-horizontal" action="{{url('/login')}}" method="post">
                {{csrf_field()}}
                <h2>Вход</h2>
                <div class="form-group {{$errors->has('email')?' error':''}}">
                    <label for="email" class="col-md-2 control-label">E-Mail</label>
                    <div class="col-md-8">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Введите Email"
                               value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group {{$errors->has('password')?' error':''}}">
                    <label for="password" class="col-md-2 control-label">Пароль:</label>
                    <div class="col-md-8">
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Введите пароль">
                        @if ($errors->has('password'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox col-md-3 col-md-offset-2">
                        <label>
                            <input type="checkbox" name="remember"> Запомнить меня
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 col-md-offset-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i> Вход
                        </button>
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Забыли пароль?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
