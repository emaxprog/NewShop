@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin">
            <h2>Редактировать категорию "{!! $category->name !!}"</h2>
            <div class="login-form">
                <form action="{{route('admin.category.update',['id'=>$category->id])}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                    <label>Название</label><br>
                    <input type="text" name="name" placeholder="" value="{!! $category->name !!}"><br>
                    <label>Главная категория</label><br>
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
                    <br>
                    <label>Порядковый номер</label><br>
                    <input type="text" name="weight" placeholder=""
                           value="{!! $category->weight !!}"><br>
                    <label>Статус</label><br>
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
                    <br>
                    <input type="submit" class="btn btn-default" value="Сохранить"><br>
                </form>
            </div>
        </div>
    </div>
@endsection