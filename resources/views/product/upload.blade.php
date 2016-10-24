@foreach ($products as $product)
    <tr>
        <td>{!! $product->code !!}</td>
        <td>{!! $product->name !!}</td>
        <td>{!! $product->price !!} руб.</td>
        <td><a href="{{route('admin.product.edit',['id'=>$product->id])}}" class="btn btn-info"
               title="Редактировать"><i
                        class="fa fa-edit fa-lg"></i></a></td>
        <td>
            <button type="button" data-id="{{$product->id}}"
                    class="delete delete-product btn btn-danger"><i
                        class="fa fa-trash-o fa-lg"></i></button>
        </td>
    </tr>
@endforeach