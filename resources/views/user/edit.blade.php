@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Редактировать данные</h3>
            <form action="{{route('user.update',$user->id)}}" method="post"
                  class="form form-horizontal">{{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="name" class="control-label col-md-1">Имя</label>
                    <div class="col-md-4">
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
                    <label for="surname" class="control-label col-md-1">Фамилия</label>
                    <div class="col-md-4">
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
                    <label for="phone" class="control-label col-md-1">Телефон</label>
                    <div class="col-md-4">
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
                    <label for="address" class="control-label col-md-1">Адрес</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="address" id="address" placeholder="Введите адрес"
                               value="{{ $user->address }}">
                        @if ($errors->has('address'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('address') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-save-user btn-primary"> Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection