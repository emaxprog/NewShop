<nav class="menu-products">
    <ul class="list-unstyled">
        @foreach ($categories as $category)
            <li>
                <a href="" onclick="return false" class="menu-products-anchor"
                   data-category="{{$category['id']}}">{{$category['name']}}</a>
                @if (isset($category['subcategories']))
                    <ul class="sub-menu list-unstyled">
                        @foreach ($category['subcategories'] as $subcategory)
                            <li>
                                <a href="{{route('category',['id'=>$subcategory])}}"
                                   data-category="{{$subcategory['id']}}">{{$subcategory['name']}}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</nav>
