@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data"
                  class="form form-horizontal">
                {{csrf_field()}}
                <h2 class="text-center">Добавить новый товар</h2>
                <div class="form-group">
                    <label class="control-label col-md-2">Название товара</label>
                    <div class="col-md-10">
                        <input type="text" name="name" placeholder="Введите название" value="{{old('name')}}"
                               class="form-control">
                        @if($errors->has('name'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Производитель</label>
                    <div class="col-md-10">
                        <select name="manufacturer_id" class="form-control">
                            @foreach($manufacturers as $manufacturer)
                                <option value="{{$manufacturer->id}}">
                                    {!! $manufacturer->name !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Артикул</label>
                    <div class="col-md-10">
                        <input type="text" name="code" placeholder="Введите артикул" value="{{old('code')}}"
                               class="form-control">
                        @if ($errors->has('code'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('code') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Стоимость, руб.</label>
                    <div class="col-md-10">
                        <input type="text" name="price" placeholder="Введите стоимость" value="{{old('price')}}"
                               class="form-control">
                        @if ($errors->has('price'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('price') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Категория</label>
                    <div class="col-md-10">
                        <select name="category_id" class="form-control">
                            @foreach ($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}">
                                    {!! $subcategory->name !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">Изображение товара</label>
                    <div class="col-md-10">
                        <input type="file" name="images[]" accept="image/*">
                        @if ($errors->has('images'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('images') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Дополнительные изображения</label>
                    <div class="col-md-10">
                        <button type="button" class="add-images-products btn btn-default"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Краткое описание</label>
                    <div class="col-md-10">
                        <textarea name="description" class="form-control"
                                  placeholder="Введите краткое описание">{!! old('description') !!}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Новинка</label>
                    <div class="col-md-10">
                        <select name="is_new" class="form-control">
                            <option value="1" selected>Да</option>
                            <option value="0">Нет</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Рекомендуемый</label>
                    <div class="col-md-10">
                        <select name="is_recommended" class="form-control">
                            <option value="1" selected>Да</option>
                            <option value="0">Нет</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Статус</label>
                    <div class="col-md-10">
                        <select name="visibility" class="form-control">
                            <option value="1" selected>Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Количество</label>
                    <div class="col-md-10">
                        <input type="text" name="amount" class="form-control"
                               placeholder="Введите количество товара" value="{{old('amount')}}">
                        @if($errors->has('amount'))
                            <div class="alert alert-danger">
                                <strong>{!! $errors->first('amount') !!}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Характеристики</label>
                    <div class="col-md-10">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <button class="btn btn-default" id="btn-add-parameters" type="button"><i
                                            class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary center-block">Сохранить</button>
                </div>
            </form>
        </div>

    </div>
    <div class="modal fade" role="dialog" aria-hidden="true" id="modal-add-attribute">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Добавить параметр</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Наименование параметра</label>
                        <input type="text" name="attribute-name" class="form-control"
                               placeholder="Наименование параметра">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Единица измерения</label>
                        <input type="text" name="unit" class="form-control" placeholder="Единица измерения">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="btn-close" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary" id="btn-save" data-dismiss="modal">Сохранить
                        изменения
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" aria-hidden="true" id="modal-delete-attribute">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Удалить параметр</h4>
                </div>
                <div class="modal-body">
                    <table class="table-attributes table">
                        <thead>
                        <tr>
                            <th>Параметр</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productAttributes as $attribute)
                            <tr>
                                <td>{!! $attribute->name !!}</td>
                                <td data-id="{{$attribute->id}}" class="delete-attribute">
                                    <button type="button" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-da-close" class="btn btn-default" data-dismiss="modal">Закрыть
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection