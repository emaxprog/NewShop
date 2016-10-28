@foreach($checkpoints as $checkpoint)
    <option value="{{$checkpoint->id}}">{!! $checkpoint->name !!}
        ({!! $checkpoint->street !!} {!! $checkpoint->num_home !!})
    </option>
@endforeach