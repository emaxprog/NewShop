@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin-update">
            <h2>Редактировать шапку</h2>
            <div class="admin-form">
                <form action="{{route('admin.header.update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row {{$errors->has('phone1')? 'error':''}}">
                        <label for="phone1">Телефон</label>
                        <input type="text" name="phone1" placeholder="Введите телефон" value="{!! $header->phone1 !!}">
                        @if($errors->has('phone1'))
                            <span class="help-block">
                                <strong>{{$errors->first('phone1')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row {{$errors->has('phone2')? 'error':''}}">
                        <label for="phone2">Телефон</label>
                        <input type="text" name="phone2" placeholder="Введите телефон" value="{!! $header->phone1 !!}">
                        @if($errors->has('phone2'))
                            <span class="help-block">
                                <strong>{{$errors->first('phone2')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row {{$errors->has('address')? 'error':''}}">
                        <label>Адрес</label>
                        <input type="text" name="address" placeholder="Введите адрес" value="{!! $header->address !!}">
                        @if($errors->has('address'))
                            <span class="help-block">
                                <strong>{{$errors->first('address')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row {{$errors->has('logotype')? 'error':''}}">
                        <label>Логотип</label>
                        <img src="{{$header->logotype}}" width="200px" alt=""/>
                        <input type="file" name="logotype">
                        @if($errors->has('logotype'))
                            <span class="help-block">
                                <strong>{{$errors->first('logotype')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row {{$errors->has('favicon')? 'error':''}}">
                        <label>Иконка</label>
                        <img src="{{$header->favicon}}" width="16px" alt=""/>
                        <input type="file" name="favicon">
                        @if($errors->has('favicon'))
                            <span class="help-block">
                                <strong>{{$errors->first('favicon')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <input type="submit" class="btn btn-default" value="Сохранить">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection