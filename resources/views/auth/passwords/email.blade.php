@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <div class="container-form">
        <div class="login">
            <div class="registration-form form">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{url('/password/reset')}}" method="post">
                    {{csrf_field()}}
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
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-envelope"></i> Отправить ссылку для сброса пароля
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
