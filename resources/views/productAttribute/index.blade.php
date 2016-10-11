<div class="form-param">
    <label>Параметр</label>
    <button type="button" class="btn btn-add-parameter"><i class="fa fa-plus"></i></button>
    <select name="parameters[]">
        @foreach($productAttributes as $attribute)
            <option value="{{$attribute->id}}">{!! $attribute->name !!} ({!! $attribute->unit !!})</option>
        @endforeach
    </select>
    <button type="button" class="btn btn-remove-attribute"><i class="fa fa-minus"></i></button>
    <label>Значение параметра</label>
    <input type="text" name="values[]" placeholder="Значение параметра">
    @if($errors->has('values'))
        <div class="error">
            <span class="help-block">
                <strong>{{ $errors->first('values') }}</strong>
            </span>
        </div>
    @endif
    <button type="button" class="btn btn-remove-parameter"><i class="fa fa-minus"></i></button>
</div>