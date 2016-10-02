@extends('layouts.app')
@section('content')
    <div class="left">
        @include('include.left')
        <div class="menu-select" xmlns="http://www.w3.org/1999/html">
            <form name="form-range-price" id="form-selection" method="get">
                <div class="range-price">
                    <span>Цена, руб.</span>
                    <div class="price-input">
                        <input type="text" name="minPrice" id="min-price" placeholder="10000" value="{{$minPrice}}">
                        -
                        <input type="text" name="maxPrice" id="max-price" placeholder="300000" value="{{$maxPrice}}">
                    </div>
                    <div id="slider-range"></div>
                </div>
                <div class="manufacturer">
                    <span>Производитель</span>
                    <div class="manufacturer-list">
                        @foreach ($manufacturers as $manufacturer)
                            <div class="manufacturer-row">
                                <input type="checkbox" class="checkbox" name="manufacturers[]"
                                       id="manufacturer-{{$manufacturer->id}}"
                                       value="{{$manufacturer->id}}"
                                @if(isset($selectedManufacturersIds))
                                    @if(in_array($manufacturer->id,$selectedManufacturersIds)){{' checked'}}
                                            @endif
                                        @endif>
                                <label for="manufacturer-{{$manufacturer->id}}">{{$manufacturer->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button id="btn-selection" formaction="{{route('category',['id'=>$id])}}">Показать</button>
            </form>
        </div>
    </div>
    <div class="center">
        <div class="products">
            <div class="blocks">
                @foreach ($products as $product)
                    <div class="block">
                        @if ($product->is_new)
                            <img src="/template/images/site/new.png" class="new">
                        @endif
                        <a href="/product/{{$product->id}}">
                            <div class="img-product">
                                <img src="{{\App\Product::getPreview($product->images)}}"
                                     alt="Apple MacBook"
                                     title="Apple MacBook">
                            </div>
                            <div class="about-product">
                                <ul>
                                    <li>{{$product->name}}</li>
                                    <li>{{$product->price}} руб.</li>
                                </ul>
                            </div>
                        </a>
                        <div class="button-add-basket">
                            <a href="#" data-id="{{$product->id}}" class="btn-add-to-cart"><i
                                        class="fa fa-cart-plus fa-2x"></i>Добавить в корзину</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="pagination">
            {!! $products->appends(['minPrice'=>$minPrice,'maxPrice'=>$maxPrice,'manufacturers'=>$selectedManufacturersIds])->render() !!}
        </div>
    </div>
@endsection