@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Управление товарами</h2>
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