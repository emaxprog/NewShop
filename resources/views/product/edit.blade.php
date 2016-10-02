@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin-create">
            <h2>Добавить новый товар</h2>
            <div class="create-product-form">
                <form action="{{route('admin.product.update',['id'=>$product->id])}}" method="post"
                      enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    {{csrf_field()}}
                    <label>Название товара</label><br>
                    <input type="text" name="name" placeholder="" value="{{$product->name}}"><br>

                    <label>Производитель</label><br>
                    <select name="manufacturer_id">
                        @foreach($manufacturers as $manufacturer)
                            <option value="{{$manufacturer->id}}"
                                    @if($manufacturer->id==$product->manufacturer_id) selected @endif>
                                {!! $manufacturer->name !!}
                            </option>
                        @endforeach
                    </select>
                    <br>

                    <label>Артикул</label><br>
                    <input type="text" name="code" placeholder="" value="{{$product->code}}"><br>

                    <label>Стоимость, руб.</label><br>
                    <input type="text" name="price" placeholder="" value="{{$product->price}}"><br>

                    <label>Категория</label><br>
                    <select name="category_id">
                        @foreach ($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}"
                                    @if($subcategory->id==$product->category_id) selected @endif>
                                {!! $subcategory->name !!}
                            </option>
                        @endforeach
                    </select>
                    <br>
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

                    <label>Изображение товара</label><br>
                    <input type="file" name="images[]"><br>

                    <label>Дополнительные изображения</label><br>
                    <button type="button" id="add-images"><i class="fa fa-plus"></i></button>
                    <br>

                    <label>Детальное описание</label><br>
                    <textarea name="description">{!! $product->description !!}</textarea><br>

                    <label>Наличие на складе</label><br>
                    <select name="availability"><br>
                        <option value="1" @if($product->availability==1) selected @endif>Да</option>
                        <option value="0" @if($product->availability==0) selected @endif>Нет</option>
                    </select>
                    <br>

                    <label>Новинка</label><br>
                    <select name="is_new"><br>
                        <option value="1" @if($product->is_new==1) selected @endif>Да</option>
                        <option value="0" @if($product->is_new==0) selected @endif>Нет</option>
                    </select>
                    <br>

                    <label>Рекомендуемые</label><br>
                    <select name="is_recommended"><br>
                        <option value="1" @if($product->is_recommended==1) selected @endif>Да</option>
                        <option value="0" @if($product->is_recommended==0) selected @endif>Нет</option>
                    </select>
                    <br>

                    <label>Статус</label><br>
                    <select name="visibility"><br>
                        <option value="1" @if($product->visibility==1) selected @endif>Да</option>
                        <option value="0" @if($product->visibility==0) selected @endif>Нет</option>
                    </select>
                    <br>
                    <label>Параметры</label><br>
                    <button class="btn" id="btn-add-parameters" type="button">Добавить</button>
                    <br>
                    @foreach($params as $param)
                        <div class="form-param">
                            <label>Параметр</label>
                            <button type="button" class="btn" id="btn-add-parameter"><i class="fa fa-plus"></i></button>
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
                            <button type="button" class="btn" id="btn-remove-parameter"><i class="fa fa-minus"></i>
                            </button>
                            <br>
                        </div>
                    @endforeach
                    <input type="submit" class="btn btn-default" value="Сохранить">
                </form>
            </div>
        </div>
    </div>
    <div style="display:none" id="myModal" title="Добавить параметр">
        <label>Наименование параметра</label><br>
        <input type="text" name="attribute-name" placeholder="Наименование параметра"><br>
        <label>Единица измерения</label><br>
        <input type="text" name="unit" placeholder="Единица измерения"><br>
        <div class="buttons-params">
            <button type="button" id="btn-close">Закрыть</button>
            <button type="button" id="btn-save">Сохранить изменения</button>
        </div>
    </div>
@endsection