@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    @include('include.left')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="menu-select">
                        <form name="form-range-price" id="form-selection" method="get" class="form" role="form">
                            <h4>Цена, руб.</h4>
                            <div class="row">
                                <div class="range-price form-group">
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="minPrice" id="min-price"
                                               placeholder="10000"
                                               value="{{$minPrice}}">
                                    </div>
                                    <div class="col-md-2">
                                        <span><i class="fa fa-minus"></i></span>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="maxPrice" id="max-price"
                                               placeholder="300000"
                                               value="{{$maxPrice}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                            <h4>Производитель</h4>
                            <div class="manufacturer row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="manufacturer-list">
                                            @foreach ($manufacturers as $manufacturer)
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="checkbox" name="manufacturers[]"
                                                               id="manufacturer-{{$manufacturer->id}}"
                                                               value="{{$manufacturer->id}}"
                                                        @if(isset($selectedManufacturersIds))
                                                            @if(in_array($manufacturer->id,$selectedManufacturersIds)){{' checked'}}
                                                                    @endif
                                                                @endif>
                                                        {{$manufacturer->name}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button id="btn-selection" class="btn btn-default btn-block"
                                    formaction="{{route('category',['id'=>$id])}}">Показать
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 products">
            <div class="row list-products">
                @foreach ($products as $product)
                    <div class="col-md-4 product-block">
                        <div class="thumbnail">
                            @if ($product->is_new)
                                <img src="/template/images/site/new.png" class="new">
                            @endif
                            <a href="/product/{{$product->id}}">
                                <img src="{{\App\Product::getPreview($product->images)}}" alt="Apple MacBook"
                                     title="Apple MacBook" id="img-{{$product->id}}" class="img-rounded img-responsive"
                                     height="150px">
                                <p class="text-center">{{$product->name}}</p>
                                <p class="text-center product-price">{{$product->price}} руб.</p>
                            </a>
                            <div class="caption">
                                <button type="button" class="btn btn-primary btn-block buy-btn" onclick="return false"
                                        data-id="{{$product->id}}"
                                        data-name="{{$product->name}}"
                                        data-price="{{$product->price}}"><i class="fa fa-cart-plus fa-2x"></i> Добавить
                                    в корзину
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12 div-pagination">
                    <div class="pagination">
                        {!! $products->appends(['minPrice'=>$minPrice,'maxPrice'=>$maxPrice,'manufacturers'=>$selectedManufacturersIds])->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection