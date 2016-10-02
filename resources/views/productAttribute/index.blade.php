<div class="form">
    <label>Параметр</label>
    <button type="button" class="btn" id="btn-add-parameter"><i class="fa fa-plus"></i></button>
    <select name="parameters[]">
        @foreach($productAttributes as $attribute)
            <option value="{{$attribute->id}}">{!! $attribute->name !!} ({!! $attribute->unit !!})</option>
        @endforeach
    </select>
    <label>Значение параметра</label>
    <input type="text" name="values[]" placeholder="Значение параметра">
    <button type="button" class="btn" id="btn-remove-parameter"><i class="fa fa-minus"></i></button>
</div>