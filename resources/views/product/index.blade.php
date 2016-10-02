@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin">
            <h2>Управление товарами</h2>
            <a href="{{route('admin.product.create')}}" class="btn-add-product"><i class="fa fa-plus"></i> Добавить
                товар</a>
            <h4>Список товаров</h4>
            <table class="table-products" id="table-products-ajax">
                <tr>
                    <th>Артикул</th>
                    <th>Название товара</th>
                    <th>Цена</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <td>{!! $product->code !!}</td>
                        <td>{!! $product->name !!}</td>
                        <td>{!! $product->price !!} руб.</td>
                        <td><a href="{{route('admin.product.edit',['id'=>$product->id])}}" title="Редактировать"><i
                                        class="fa fa-edit fa-lg"></i></a></td>
                        <td><span data-id="{{$product->id}}" class="delete-product"><i class="fa fa-trash-o fa-lg"></i></span>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="btn-more">
                <button id="btn-more"><i class="fa fa-arrow-down fa-lg"></i> Дальше <i
                            class="fa fa-arrow-down fa-lg"></i></button>
            </div>
        </div>
    </div>
    <div class="popup-success-wrapper">
        <div class="popup-success"></div>
    </div>
@endsection