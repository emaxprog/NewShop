@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('include/left')
        </div>
        <div class="col-md-9 products">
            {{--<div class="row">--}}
            {{--<div class="block" style="background: #5e5e5e;height: 100px;"></div>--}}
            {{--</div>--}}
            <div class="row">
                @foreach ($latestProducts as $product)
                    <div class="col-md-4">
                        <div class="thumbnail">
                            @if ($product->is_new)
                                <img src="/template/images/site/new.png" class="new">
                            @endif
                            <a href="{{route('product.show',['id'=>$product->id])}}">
                                <img src="{{\App\Product::getPreview($product->images)}}" alt="Apple MacBook"
                                     title="Apple MacBook" id="img-{{$product->id}}" height="150px">

                                <div class="about-product">
                                    <ul>
                                        <li>{{$product->name}}</li>
                                        <li>{{$product->price}} руб.</li>
                                    </ul>
                                </div>
                            </a>
                            <div class="caption">
                                <a href="" class="btn btn-primary btn-block" onclick="return false"
                                   data-id="{{$product->id}}"
                                   data-name="{{$product->name}}"
                                   data-price="{{$product->price}}"
                                   class="buy-btn"><i
                                            class="fa fa-cart-plus fa-2x"></i>Добавить в корзину</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{--@include('include.left')--}}
    {{--<div class="center">--}}
    {{--<div class="afisha">--}}
    {{--@include('include.slider')--}}
    {{--</div>--}}
    {{--<div class="latest-products">--}}
    {{--<h1>Последние товары</h1>--}}
    {{--<div class="blocks">--}}
    {{--@foreach ($latestProducts as $product)--}}
    {{--<div class="block">--}}
    {{--@if ($product->is_new)--}}
    {{--<img src="/template/images/site/new.png" class="new">--}}
    {{--@endif--}}
    {{--<a href="{{route('product.show',['id'=>$product->id])}}">--}}
    {{--<div class="img-product">--}}
    {{--<img src="{{\App\Product::getPreview($product->images)}}" alt="Apple MacBook"--}}
    {{--title="Apple MacBook" id="img-{{$product->id}}">--}}
    {{--</div>--}}
    {{--<div class="about-product">--}}
    {{--<ul>--}}
    {{--<li>{{$product->name}}</li>--}}
    {{--<li>{{$product->price}} руб.</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--<div class="button-add-basket">--}}
    {{--<a href="" onclick="return false" data-id="{{$product->id}}"--}}
    {{--data-name="{{$product->name}}"--}}
    {{--data-price="{{$product->price}}"--}}
    {{--class="buy-btn"><i--}}
    {{--class="fa fa-cart-plus fa-2x"></i>Добавить в корзину</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="recomended-products">--}}
    {{--<h1>Рекомендуемые товары</h1>--}}
    {{--<div class="blocks">--}}
    {{--@foreach ($recommendedProducts as $product)--}}
    {{--<div class="block">--}}
    {{--@if ($product->is_new)--}}
    {{--<img src="/template/images/site/hit.png" class="sale">--}}
    {{--@endif--}}
    {{--<a href="/product/{{$product->id}}">--}}
    {{--<div class="img-product">--}}
    {{--<img src="{{\App\Product::getPreview($product->images)}}" alt="Apple MacBook"--}}
    {{--title="Apple MacBook">--}}
    {{--</div>--}}
    {{--<div class="about-product">--}}
    {{--<ul>--}}
    {{--<li>{{$product->name}}</li>--}}
    {{--<li>{{$product->price}} руб.</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--<div class="button-add-basket">--}}
    {{--<a href="" onclick="return false" data-id="{{$product->id}}" class="buy-btn"><i--}}
    {{--class="fa fa-cart-plus fa-2x"></i>Добавить в корзину</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection