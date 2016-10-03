@extends('layouts.admin')
@section('content')
    <div class="admin">
        <h2>Управление афишей</h2>
        <div class="admin-form">
            <form action="{{route('admin.afisha.update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <div class="row">
                    @if(isset($images))
                        @foreach($images as $image)
                            <div class="img-afisha">
                                <img src="{{$image}}" style="width: 940px;height: 300px;">
                                <button type="button" class="delete-image-afisha"><i class="fa fa-minus fa-lg"></i>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="row {{$errors->has('images')? 'error':''}}">
                    <h3>Изображения</h3>
                    <button type="button" id="add-image-afisha"><i class="fa fa-plus fa-lg"></i></button>
                    @if($errors->has('images'))
                        <span class="help-block">
                                <strong>{{$errors->first('images')}}</strong>
                            </span>
                    @endif
                </div>
                <div class="row">
                    <input type="submit" value="Сохранить">
                </div>
            </form>
        </div>
    </div>
@endsection