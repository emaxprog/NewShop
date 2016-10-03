@extends('layouts.admin')
@section('content')
    <div class="admin">
        <h2>Управление афишей</h2>
        <form action="{{route('admin.afisha.update')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
            @if(isset($images))
                @foreach($images as $image)
                    <div class="img-afisha">
                        <img src="{{$image}}" style="width: 940px;height: 300px;">
                        <button type="button" class="delete-image-afisha"><i class="fa fa-minus fa-lg"></i></button>
                    </div>
                @endforeach
            @endif
            <h3>Изображения</h3>
            <button type="button" id="add-image-afisha"><i class="fa fa-plus fa-lg"></i></button>
            <br>
            <input type="submit" value="Сохранить">
        </form>
    </div>
@endsection