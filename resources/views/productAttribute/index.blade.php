<div class="form-group">
    <label class="control-label col-md-2">Параметр</label>
    <button type="button" class="btn btn-default btn-add-parameter col-md-1"><i class="fa fa-plus"></i></button>
    <div class="col-md-3">
        <select name="parameters[]" class="form-control">
            @foreach($productAttributes as $attribute)
                <option value="{{$attribute->id}}">{!! $attribute->name !!} ({!! $attribute->unit !!})</option>
            @endforeach
        </select>
    </div>
    <button type="button" class="btn btn-default btn-remove-attribute col-md-1"><i class="fa fa-minus"></i></button>
    <label class="control-label col-md-1">Значение</label>
    <div class="col-md-2">
        <input type="text" name="values[]" placeholder="Значение параметра" class="form-control">
        @if($errors->has('values'))
            <div class="alert alert-danger">
                <strong>{{ $errors->first('values') }}</strong>
            </div>
        @endif
    </div>
    <button type="button" class="btn btn-danger btn-remove-parameter col-md-1"><i class="fa fa-minus"></i></button>
</div>