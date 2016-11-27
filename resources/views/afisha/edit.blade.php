@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('admin.afisha.update')}}" method="post" enctype="multipart/form-data"
                  class="form form-horizontal">
                {{csrf_field()}}
                <h2 class="text-center">Управление афишей</h2>
                <input type="hidden" name="_method" value="PUT">
                <div class="row">
                    @if(isset($images))
                        @foreach($images as $image)
                            <div class="thumbnail image-afisha">
                                <img src="{{$image}}" class="img-rounded">
                                <div class="caption">
                                    <button type="button" class="btn btn-danger btn-block delete-image-afisha"><i
                                                class="fa fa-trash fa-lg"></i>
                                    </button>
                                </div>

                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <h3>Изображения</h3>
                    <button type="button" id="add-image-afisha" class="btn btn-default"><i class="fa fa-plus fa-lg"></i>
                    </button>
                    @if($errors->has('images'))
                        <div class="alert alert-danger">
                            <strong>{{$errors->first('images')}}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary center-block">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection