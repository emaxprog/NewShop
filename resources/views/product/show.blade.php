@extends('layouts.app')
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
                <div class="button-add-basket">
                    <a href="" onclick="return false" data-id="{{$product->id}}"
                       data-name="{{$product->name}}"
                       data-price="{{$product->price}}"
                       class="buy-btn"><i
                                class="fa fa-cart-plus fa-2x"></i>Добавить в корзину</a>
                </div>
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
                <h2>Краткое описание</h2>
                <p>{!! $product->description !!}</p>
                <h2>Характеристики</h2>
                <table class="table-params">
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