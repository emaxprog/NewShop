@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('admin.order.update',['id'=>$order->id])}}" method="post"
                  class="form form-horizontal">
                {{csrf_field()}}
                <h2 class="text-center">Редактировать заказ #{!! $order->id !!}</h2>
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label class="control-label col-md-1">Статус</label>
                    <div class="col-md-11">
                        <select name="status" class="form-control">
                            @foreach($statusList as $status)
                                <option value="{{$status->id}}"
                                        @if($order->status_id==$status->id) selected @endif>{!! $status->name !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary center-block">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection