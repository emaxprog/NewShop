@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin-update">
            <h2>Редактировать шапку</h2>
            <div class="header-form">
                <form action="{{route('admin.header.update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                    <label for="phone1">Тел:</label><br>
                    <input type="text" name="phone1" placeholder="Введите телефон" value="{!! $header->phone1 !!}"><br>
                    <label for="phone2">Тел:</label><br>
                    <input type="text" name="phone2" placeholder="Введите телефон" value="{!! $header->phone1 !!}"><br>
                    <label>Адрес:</label><br>
                    <input type="text" name="address" placeholder="Введите адрес" value="{!! $header->address !!}"><br>
                    <label>Логотип</label><br>
                    <img src="{{$header->logotype}}" width="200px" alt=""/><br>
                    <input type="file" name="logotype"><br>
                    <br>
                    <label>Иконка</label><br>
                    <img src="{{$header->favicon}}" width="16px" alt=""/><br>
                    <input type="file" name="favicon"><br>
                    <br>
                    <input type="submit" class="btn btn-default" value="Сохранить"><br>
                </form>
            </div>
        </div>
    </div>
@endsection