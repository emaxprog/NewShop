@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <form action="{{url('/register')}}" method="post" class="form form-horizontal">{{csrf_field()}}
            <h2 class="text-center">Регистрация</h2>
            <div class="form-group">
                <label for="email" class="control-label col-md-2">E-Mail</label>
                <div class="col-md-8">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Введите Email"
                           value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="control-label col-md-2">Пароль:</label>
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
                <label for="password_confirmation" class="control-label col-md-2">Подтвердите пароль</label>
                <div class="col-md-8">
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                           placeholder="Подтвердите пароль">
                    @if ($errors->has('password_confirmation'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-md-2">Имя</label>
                <div class="col-md-8">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Введите имя"
                           value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="surname" class="control-label col-md-2">Фамилия</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="surname" id="surname" placeholder="Введите фамилию"
                           value="{{ old('surname') }}">
                    @if ($errors->has('surname'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('surname') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="control-label col-md-2">Телефон</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Введите телефон"
                           value="{{ old('phone') }}">
                    @if ($errors->has('phone'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="control-label col-md-2">Адрес</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="address" id="address" placeholder="Введите адрес"
                           value="{{ old('address') }}">
                    @if ($errors->has('address'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('address') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-5 col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fa fa-btn fa-user"></i> Регистрация
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
