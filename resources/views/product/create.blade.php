@extends('layouts.admin')
@section('content')
    <div class="center-admin">
        <div class="admin-create">
            <h2>Добавить новый товар</h2>
            <div class="create-product-form">
                <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <label>Название товара</label><br>
                    <input type="text" name="name" placeholder="" value=""><br>

                    <label>Производитель</label><br>
                    <select name="manufacturer_id">
                        @foreach($manufacturers as $manufacturer)
                            <option value="{{$manufacturer->id}}">
                                {!! $manufacturer->name !!}
                            </option>
                        @endforeach
                    </select>
                    <br>

                    <label>Артикул</label><br>
                    <input type="text" name="code" placeholder="" value=""><br>

                    <label>Стоимость, руб.</label><br>
                    <input type="text" name="price" placeholder="" value=""><br>

                    <label>Категория</label><br>
                    <select name="category_id">
                        @foreach ($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}">
                                {!! $subcategory->name !!}
                            </option>
                        @endforeach
                    </select>
                    <br>

                    <label>Изображение товара</label><br>
                    <input type="file" name="images[]"><br>

                    <label>Дополнительные изображения</label><br>
                    <button type="button" id="add-images-products"><i class="fa fa-plus"></i></button>
                    <br>

                    <label>Детальное описание</label><br>
                    <textarea name="description"></textarea><br>

                    <label>Наличие на складе</label><br>
                    <select name="availability"><br>
                        <option value="1" selected>Да</option>
                        <option value="0">Нет</option>
                    </select>
                    <br>

                    <label>Новинка</label><br>
                    <select name="is_new"><br>
                        <option value="1" selected>Да</option>
                        <option value="0">Нет</option>
                    </select>
                    <br>

                    <label>Рекомендуемые</label><br>
                    <select name="is_recommended"><br>
                        <option value="1" selected>Да</option>
                        <option value="0">Нет</option>
                    </select>
                    <br>

                    <label>Статус</label><br>
                    <select name="visibility"><br>
                        <option value="1" selected>Отображается</option>
                        <option value="0">Скрыт</option>
                    </select>
                    <br>
                    <label>Параметры</label><br>
                    <button class="btn" id="btn-add-parameters" type="button">Добавить</button>
                    <br>
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