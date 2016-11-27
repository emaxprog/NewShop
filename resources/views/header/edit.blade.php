@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('admin.header.update')}}" method="post" enctype="multipart/form-data"
                  class="form form-horizontal">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <h2 class="text-center">Управление шапкой</h2>
                <div class="form-group">
                    <label for="phone1" class="control-label col-md-2">Телефон</label>
                    <div class="col-md-10">
                        <input type="text" name="phone1" placeholder="Введите телефон" class="form-control"
                               value="{!! $header->phone1 !!}" id="phone1">
                        @if($errors->has('phone1'))
                            <div class="alert alert-danger">
                                <strong>{{$errors->first('phone1')}}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone2" class="control-label col-md-2">Телефон</label>
                    <div class="col-md-10">
                        <input type="text" name="phone2" placeholder="Введите телефон" class="form-control"
                               value="{!! $header->phone2 !!}" id="phone2">
                        @if($errors->has('phone2'))
                            <div class="alert alert-danger">
                                <strong>{{$errors->first('phone2')}}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="control-label col-md-2">Адрес</label>
                    <div class="col-md-10">
                        <input type="text" name="address" placeholder="Введите адрес" class="form-control"
                               value="{!! $header->address !!}"
                               id="address">
                        @if($errors->has('address'))
                            <div class="alert alert-danger">
                                <strong>{{$errors->first('address')}}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Логотип</label>
                    <div class="col-md-10">
                        <input type="file" name="logotype" accept="image/*">
                        @if($errors->has('logotype'))
                            <div class="alert alert-danger">
                                <strong>{{$errors->first('logotype')}}</strong>
                            </div>
                        @endif
                        <img src="{{$header->logotype}}" class="img-rounded" width="200px" alt=""/>
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Иконка</label>
                    <div class="col-md-10">
                        <input type="file" name="favicon" accept="image/*">
                        @if($errors->has('favicon'))
                            <div class="alert alert-danger">
                                <strong>{{$errors->first('favicon')}}</strong>
                            </div>
                        @endif
                        <img src="{{$header->favicon}}" class="img-rounded" width="16px" alt=""/>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary center-block">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection