@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin-create admin-create-category">
            <h2>Добавить новую категорию</h2>
            <div class="create-category-form">
                <form action="{{route('admin.category.store')}}" method="post">
                    {{csrf_field()}}
                    <label for="name">Название</label><br>
                    <input type="text" name="name" id="name" placeholder="" value=""><br>
                    <select name="parent_id">
                        <option value="0">Главная категория</option>
                        @if (isset($parents))
                            @foreach ($parents as $parent)
                                <option value="{{$parent->id}}">{!! $parent->name !!}</option>
                            @endforeach
                        @endif
                    </select>
                    <br>
                    <label for="weight">Порядковый номер</label><br>
                    <input type="text" name="weight" id="weight" placeholder="" value=""><br>
                    <label>Статус</label><br>
                    <select name="visibility">
                        <option value="1" selected="selected">Отображается</option>
                        <option value="0">Скрыта</option>
                    </select><br>
                    <input type="submit" class="btn btn-default" value="Сохранить"><br>
                </form>
            </div>
        </div>
    </div>
@endsection