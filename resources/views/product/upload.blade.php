@foreach ($products as $product)
    <tr>
        <td>{!! $product->code !!}</td>
        <td>{!! $product->name !!}</td>
        <td>{!! $product->price !!} руб.</td>
        <td><a href="{{route('admin.product.edit',['id'=>$product->id])}}" title="Редактировать"><i
                        class="fa fa-edit fa-lg"></i></a></td>
        <td><span data-id="{{$product->id}}" class="delete-product"><i class="fa fa-trash-o fa-lg"></i></span>
        </td>
    </tr>
@endforeach