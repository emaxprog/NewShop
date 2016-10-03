@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin">
            <h2>Список категорий</h2>

            <a href="{{route('admin.category.create')}}" class="btn-add-category"><i class="fa fa-plus"></i> Добавить
                категорию</a>

            <table class="table-categories">
                <tr>
                    <th>Название категории</th>
                    <th>Название главной категории</th>
                    <th>Порядковый номер</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($categories as $category)
                    <tr data-id="{{$category->id}}">
                        <td>{!! $category->name !!}</td>
                        <td>{!! \App\Category::getParentCategory($category->parent_id) !!}</td>
                        <td>{!! $category->weight !!}</td>
                        <td>{!! \App\Category::getVisivilityText($category->visibility) !!}</td>
                        <td><a href="{{route('admin.category.edit',['id'=>$category->id])}}"
                               title="Редактировать"><i class="fa fa-edit fa-lg"></i></a></td>
                        <td><span class="delete delete-category"><i class="fa fa-trash-o fa-lg"></i></span></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection