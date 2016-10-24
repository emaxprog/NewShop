@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Управление товарами</h2>
            <a href="{{route('admin.product.create')}}" class="btn-add-product btn btn-primary"><i
                        class="fa fa-plus"></i> Добавить
                товар</a>
            <h4>Список товаров</h4>
            <table class="table table-striped" id="table-products-ajax">
                <thead>
                <tr>
                    <th>Артикул</th>
                    <th>Название товара</th>
                    <th>Цена</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{!! $product->code !!}</td>
                        <td>{!! $product->name !!}</td>
                        <td>{!! $product->price !!} руб.</td>
                        <td><a href="{{route('admin.product.edit',['id'=>$product->id])}}" class="btn btn-info"
                               title="Редактировать"><i
                                        class="fa fa-edit fa-lg"></i></a></td>
                        <td>
                            <button type="button" data-id="{{$product->id}}"
                                    class="delete delete-product btn btn-danger"><i
                                        class="fa fa-trash-o fa-lg"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn btn-default" id="btn-more"><i class="fa fa-arrow-down fa-lg"></i> Дальше <i
                                class="fa fa-arrow-down fa-lg"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-success-wrapper">
        <div class="popup-success"></div>
    </div>
@endsection