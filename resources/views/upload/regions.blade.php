@foreach($regions as $region)
    <option value="{{$region->id}}">{!! $region->name !!}</option>
@endforeach