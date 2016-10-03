@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin-create admin-create-category">
            <h2>Добавить новую категорию</h2>
            <div class="admin-form">
                <form action="{{route('admin.category.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="row {{$errors->has('name')?'error':''}}">
                        <label for="name">Название</label>
                        <input type="text" name="name" id="name" placeholder="" value="{{old('name')}}">
                        @if($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <select name="parent_id">
                            <option value="0">Главная категория</option>
                            @if (isset($parents))
                                @foreach ($parents as $parent)
                                    <option value="{{$parent->id}}">{!! $parent->name !!}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="row {{$errors->has('weight')?'error':''}}">
                        <label for="weight">Порядковый номер</label>
                        <input type="text" name="weight" id="weight" placeholder="" value="{{old('weight')}}">
                        @if($errors->has('weight'))
                            <span class="help-block">
                                <strong>{{ $errors->first('weight') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <label>Статус</label>
                        <select name="visibility">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыта</option>
                        </select>
                    </div>
                    <div class="row">
                        <input type="submit" class="btn btn-default" value="Сохранить">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection