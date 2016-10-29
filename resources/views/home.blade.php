@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('include/left')
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    @include('include/slider')
                </div>
            </div>
            <div class="row list-products">
                <h2>Последние добавленные</h2>
                @foreach ($latestProducts as $product)
                    <div class="col-md-4 product-block">
                        <div class="thumbnail">
                            @if ($product->is_new)
                                <img src="/template/images/site/new.png" class="new img-responsive">
                            @endif
                            <a href="{{route('product.show',['id'=>$product->id])}}">
                                <img src="{{\App\Product::getPreview($product->images)}}" alt="Apple MacBook"
                                     title="Apple MacBook" id="img-{{$product->id}}" class="img-rounded img-responsive"
                                     height="150px">
                                <p class="text-center">{{$product->name}}</p>
                                <p class="text-center product-price">{{$product->price}} руб.</p>
                            </a>
                            <div class="caption">
                                <button type="button" class="btn btn-primary btn-block buy-btn"
                                        onclick="return false"
                                        data-id="{{$product->id}}"
                                        data-name="{{$product->name}}"
                                        data-price="{{$product->price}}"><i class="fa fa-cart-plus fa-2x"></i> Добавить
                                    в
                                    корзину
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row list-products">
                <h2>Рекомендованные товары</h2>
                @foreach ($recommendedProducts as $product)
                    <div class="col-md-4 product-block">
                        <div class="thumbnail">
                            @if ($product->is_new)
                                <img src="/template/images/site/new.png" class="new img-responsive">
                            @endif
                            <a href="{{route('product.show',['id'=>$product->id])}}">
                                <img src="{{\App\Product::getPreview($product->images)}}" alt="Apple MacBook"
                                     title="Apple MacBook" id="img-{{$product->id}}" class="img-rounded img-responsive"
                                     height="150px">
                                <p class="text-center">{{$product->name}}</p>
                                <p class="text-center product-price">{{$product->price}} руб.</p>
                            </a>
                            <div class="caption">
                                <button type="button" class="btn btn-primary btn-block buy-btn"
                                        onclick="return false"
                                        data-id="{{$product->id}}"
                                        data-name="{{$product->name}}"
                                        data-price="{{$product->price}}">
                                    <i class="fa fa-cart-plus fa-2x"></i>
                                    Добавить в корзину
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection