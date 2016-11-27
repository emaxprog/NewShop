@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('admin.category.store')}}" method="post" class="form form-horizontal">
                {{csrf_field()}}
                <h2 class="text-center">Добавить новую категорию</h2>
                <div class="form-group">
                    <label for="name" class="control-label col-md-2">Название</label>
                    <div class="col-md-10">
                        <input type="text" name="name" id="name" placeholder="Введите название категории"
                               value="{{old('name')}}" class="form-control">
                        @if($errors->has('name'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Категория</label>
                    <div class="col-md-10">
                        <select name="parent_id" class="form-control">
                            <option value="0">Главная категория</option>
                            @if (isset($parents))
                                @foreach ($parents as $parent)
                                    <option value="{{$parent->id}}">{!! $parent->name !!}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="weight" class="control-label col-md-2">Порядковый номер</label>
                    <div class="col-md-10">
                        <input type="text" name="weight" id="weight" placeholder="Введите порядковый номер"
                               value="{{old('weight')}}" class="form-control">
                        @if($errors->has('weight'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('weight') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Статус</label>
                    <div class="col-md-10">
                        <select name="visibility" class="form-control">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыта</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary center-block">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection