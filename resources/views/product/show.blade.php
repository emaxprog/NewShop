@extends('layouts.product')
@section('content')
    <div class="center">
        <div class="about-product">
            @include('include.image_gallery_slider')
            <section class="info-product">
                <h2>{{$product->name}}</h2>
                <ul>
                    <li><b>Код товара:</b> {!! $product->code !!}</li>
                    <li><b>Цена:</b>{!! $product->price !!} руб.</li>
                    <li><b>Наличие:</b> {!! $product->availability !!}</li>
                    <li><b>Производитель:</b> {!! $product->manufacturer_id !!}</li>
                </ul>
                <a href="#" data-id="{{$product->id}}" class="btn-add-to-cart"><i
                            class="fa fa-shopping-cart fa-2x"></i> Добавить в корзину</a>
            </section>
        </div>

        <div id="tabs">
            <ul>
                <li><a href="#about">Описание</a></li>
                <li><a href="#reviews">Отзывы</a></li>
                <li><a href="#comments">Комментарии</a></li>
                <li><a href="#views">Обзоры</a></li>
                <li><a href="#question-answer">Вопрос-ответ</a></li>
            </ul>
            <div id="about">
                <h3>Краткое описание</h3>
                <p>{!! $product->description !!}</p>
                <h3>Характеристики</h3>
                <table>
                    @foreach($params as $param)
                        <tr>
                            <td>{!! $param->name !!}</td>
                            <td>{!! $param->value !!}</td>
                            <td>{!! $param->unit !!}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div id="reviews">

            </div>
            <div id="comments">

            </div>
            <div id="views">

            </div>
            <div id="question-answer">

            </div>
        </div>
    </div>
@endsection