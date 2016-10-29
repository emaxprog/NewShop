@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Управление категориями</h2>
            <a href="{{route('admin.category.create')}}" class="btn-add-category btn btn-primary"><i
                        class="fa fa-plus"></i> Добавить
                категорию</a>
            <h4>Список категорий</h4>

            <table class="table table-stripes">
                <thead>
                <tr>
                    <th>Название категории</th>
                    <th>Название главной категории</th>
                    <th>Порядковый номер</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr data-id="{{$category->id}}">
                        <td>{!! $category->name !!}</td>
                        <td>{!! \App\Category::getParentCategory($category->parent_id) !!}</td>
                        <td>{!! $category->weight !!}</td>
                        <td>{!! \App\Category::getVisivilityText($category->visibility) !!}</td>
                        <td><a href="{{route('admin.category.edit',['id'=>$category->id])}}"
                               title="Редактировать" class="btn btn-info"><i class="fa fa-edit fa-lg"></i></a></td>
                        <td>
                            <button type="button" class="btn btn-danger delete-category" data-id="{{$category->id}}"><i
                                        class="fa fa-trash-o fa-lg"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection