@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin-create">
            <h2>Добавить новый товар</h2>
            <div class="admin-form">
                <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row {{$errors->has('name')?'error':''}}">
                        <label>Название товара</label>
                        <input type="text" name="name" placeholder="" value="{{old('name')}}">
                        @if($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <label>Производитель</label>
                        <select name="manufacturer_id">
                            @foreach($manufacturers as $manufacturer)
                                <option value="{{$manufacturer->id}}">
                                    {!! $manufacturer->name !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row {{$errors->has('code')?'error':''}}">
                        <label>Артикул</label>
                        <input type="text" name="code" placeholder="" value="{{old('code')}}">
                        @if ($errors->has('code'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row {{$errors->has('price')?'error':''}}">
                        <label>Стоимость, руб.</label>
                        <input type="text" name="price" placeholder="" value="{{old('price')}}">
                        @if ($errors->has('price'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row">
                        <label>Категория</label>
                        <select name="category_id">
                            @foreach ($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}">
                                    {!! $subcategory->name !!}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row {{$errors->has('images')?'error':''}}">
                        <label>Изображение товара</label>
                        <input type="file" name="images[]" accept="image/*">
                        @if ($errors->has('images'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('images') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row">
                        <label>Дополнительные изображения</label>
                        <button type="button" class="add-images-products"><i class="fa fa-plus"></i></button>
                    </div>
                    <div class="row {{$errors->has('description')?'error':''}}">
                        <label>Детальное описание</label>
                        <textarea name="description">{!! old('description') !!}</textarea>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row">
                        <label>Наличие на складе</label>
                        <select name="availability">
                            <option value="1" selected>Да</option>
                            <option value="0">Нет</option>
                        </select>
                    </div>
                    <div class="row">
                        <label>Новинка</label>
                        <select name="is_new">
                            <option value="1" selected>Да</option>
                            <option value="0">Нет</option>
                        </select>
                    </div>
                    <div class="row">
                        <label>Рекомендуемые</label>
                        <select name="is_recommended">
                            <option value="1" selected>Да</option>
                            <option value="0">Нет</option>
                        </select>
                    </div>
                    <div class="row">
                        <label>Статус</label>
                        <select name="visibility">
                            <option value="1" selected>Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>
                    </div>
                    <div class="row">
                        <label>Характеристики</label>
                        <button class="btn" id="btn-add-parameters" type="button"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="row">
                        <input type="submit" class="btn btn-default" value="Сохранить">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div style="display:none" id="modal-add-attribute" title="Добавить параметр">
        <label>Наименование параметра</label>
        <input type="text" name="attribute-name" placeholder="Наименование параметра">
        <label>Единица измерения</label>
        <input type="text" name="unit" placeholder="Единица измерения">
        <div class="buttons-params">
            <button type="button" id="btn-close">Закрыть</button>
            <button type="button" id="btn-save">Сохранить изменения</button>
        </div>
    </div>
    <div style="display: none" id="modal-delete-attribute" title="Удалить параметр">
        <table class="table-attributes">
            @foreach($productAttributes as $attribute)
                <tr>
                    <td>{!! $attribute->name !!}</td>
                    <td data-id="{{$attribute->id}}" class="delete-attribute"><i class="fa fa-trash fa-lg"></i></td>
                </tr>
            @endforeach
        </table>
        <div class="buttons-params">
            <button type="button" id="btn-da-close">Закрыть</button>
        </div>
    </div>
@endsection