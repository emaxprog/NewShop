@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin-create">
            <h2>Добавить новый товар</h2>
            <div class="admin-form">
                <form action="{{route('admin.product.update',['id'=>$product->id])}}" method="post"
                      enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    {{csrf_field()}}
                    <div class="row {{$errors->has('name')?'error':''}}">
                        <label>Название товара</label>
                        <input type="text" name="name" placeholder="" value="{{$product->name}}">
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
                                <option value="{{$manufacturer->id}}"
                                        @if($manufacturer->id==$product->manufacturer_id) selected @endif>
                                    {!! $manufacturer->name !!}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row {{$errors->has('code')?'error':''}}">
                        <label>Артикул</label>
                        <input type="text" name="code" placeholder="" value="{{$product->code}}">
                        @if ($errors->has('code'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row {{$errors->has('price')?'error':''}}">
                        <label>Стоимость, руб.</label>
                        <input type="text" name="price" placeholder="" value="{{$product->price}}">
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
                                <option value="{{$subcategory->id}}"
                                        @if($subcategory->id==$product->category_id) selected @endif>
                                    {!! $subcategory->name !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="images-edit">
                            @if(!empty($images))
                                @foreach($images as $image)
                                    <div class="image-edit">
                                        <img src="{{$image}}" width="100px" data-id="{{$product->id}}">
                                        <button type="button" class="delete-image"><i class="fa fa-minus fa-lg"></i>
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="row {{$errors->has('images')?'error':''}}">
                        <label>Изображение товара</label>
                        <input type="file" name="images[]">
                        @if ($errors->has('images'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('images') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row">
                        <label>Дополнительные изображения</label>
                        <button type="button" id="add-images-products"><i class="fa fa-plus"></i></button>
                    </div>
                    <div class="row {{$errors->has('description')?'error':''}}">
                        <label>Детальное описание</label>
                        <textarea name="description">{!! $product->description !!}</textarea>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row">

                        <label>Наличие на складе</label>
                        <select name="availability">
                            <option value="1" @if($product->availability==1) selected @endif>Да</option>
                            <option value="0" @if($product->availability==0) selected @endif>Нет</option>
                        </select>
                    </div>
                    <div class="row">

                        <label>Новинка</label>
                        <select name="is_new">
                            <option value="1" @if($product->is_new==1) selected @endif>Да</option>
                            <option value="0" @if($product->is_new==0) selected @endif>Нет</option>
                        </select>
                    </div>
                    <div class="row">
                        <label>Рекомендуемые</label>
                        <select name="is_recommended">
                            <option value="1" @if($product->is_recommended==1) selected @endif>Да</option>
                            <option value="0" @if($product->is_recommended==0) selected @endif>Нет</option>
                        </select>
                    </div>
                    <div class="row">
                    </div>
                    <div class="row">
                        <label>Статус</label>
                        <select name="visibility">
                            <option value="1" @if($product->visibility==1) selected @endif>Да</option>
                            <option value="0" @if($product->visibility==0) selected @endif>Нет</option>
                        </select>
                    </div>
                    <div class="row">
                        <label>Характеристики</label>
                        <button class="btn" id="btn-add-parameters" type="button"><i class="fa fa-plus"></i></button>

                        @foreach($params as $param)
                            <div class="form-param">
                                <label>Параметр</label>
                                <button type="button" class="btn btn-add-parameter"><i class="fa fa-plus"></i>
                                </button>
                                <select name="parameters[]">
                                    @foreach($productAttributes as $attribute)
                                        <option value="{{$attribute->id}}"
                                                @if($attribute->id==$param->id) selected @endif>{!! $attribute->name !!}
                                            ({!! $attribute->unit !!})
                                        </option>
                                    @endforeach
                                </select>
                                <label>Значение параметра</label>
                                <input type="text" name="values[]" placeholder="Значение параметра"
                                       value="{{$param->value}}">
                                <button type="button" class="btn btn-remove-parameter"><i class="fa fa-minus"></i>
                                </button>

                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <input type="submit" class="btn btn-default" value="Сохранить">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div style="display:none" id="myModal" title="Добавить параметр">
        <label>Наименование параметра</label>
        <input type="text" name="attribute-name" placeholder="Наименование параметра">
        <label>Единица измерения</label>
        <input type="text" name="unit" placeholder="Единица измерения">
        <div class="buttons-params">
            <button type="button" id="btn-close">Закрыть</button>
            <button type="button" id="btn-save">Сохранить изменения</button>
        </div>
    </div>
@endsection