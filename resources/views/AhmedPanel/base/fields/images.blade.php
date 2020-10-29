<div class="col-md-12">
    <label for="{{$Field['name']}}" class="control-label">{{__('crud.'.$lang.'.'.$Field['name'])}} @if($Field['is_required'])*@endif</label>
    <input type="file" name="{{$Field['name']}}[]" id="{{$Field['name']}}" multiple class="">
    @if ($errors->has($Field['name']))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($Field['name']) }}</strong>
        </span>
    @endif
    @if($value)
        <div class="row mt-50 px-20">
            @foreach($value->{$Field['entity']} as $media)
                <span style="position: relative;width: 120px;height: 120px;display: inline-block">
                    <a href="{{url('delete/media?media_id='.$media->id)}}" class="text-danger" style="position: absolute;top: 5px;right: 10px;"><i class="text-danger fa fa-window-close"></i></a>
                    <img style="width: 120px;height: 120px;display: inline-block" src="{{$media->getFile()}}" alt="" class="thumbnail"/>
                </span>
            @endforeach
        </div>
    @endif
</div>
