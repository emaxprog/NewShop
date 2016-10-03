@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin">
            <h2>Редактировать категорию "{!! $category->name !!}"</h2>
            <div class="admin-form">
                <form action="{{route('admin.category.update',['id'=>$category->id])}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row {{$errors->has('name')?'error':''}}">
                        <label>Название</label>
                        <input type="text" name="name" placeholder="" value="{!! $category->name !!}">
                        @if($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <label>Главная категория</label>
                        <select name="parent_id">
                            <option value="0">Главная категория</option>
                            @if (isset($parents))
                                @foreach ($parents as $parent)
                                    <option value="{{$parent->id}}"
                                            @if($parent->id==$category->parent_id) selected @endif
                                    >{!! $parent->name !!}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="row {{$errors->has('weight')?'error':''}}">
                        <label>Порядковый номер</label>
                        <input type="text" name="weight" placeholder=""
                               value="{!! $category->weight !!}">
                        @if($errors->has('weight'))
                            <span class="help-block">
                                <strong>{{ $errors->first('weight') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <label>Статус</label>
                        <select name="visibility">
                            <option
                                    value="1" @if($category->visibility==1) selected @endif>
                                Отображается
                            </option>
                            <option
                                    value="0" @if($category->visibility==0) selected @endif>
                                Скрыта
                            </option>
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