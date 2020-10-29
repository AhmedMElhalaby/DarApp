<div class="col-md-12">
    <label for="{{$Field['name']}}" class="control-label">{{__('crud.'.$lang.'.'.$Field['name'])}} @if($Field['is_required'])*@endif</label>
    <input type="file" name="{{$Field['name']}}" style="display: none" id="{{$Field['name']}}"  class="form-control" onchange="ImageViewCrud(this,'{{$Field['name']}}');">
    <img id="Image-crud-{{$Field['name']}}" onclick="document.getElementById('{{$Field['name']}}').click()" src="{{($value)?asset($value):asset('assets/img/upload.jpg')}}" style="width: 120px;height: 120px" alt="upload image" class="thumbnail"/>
    @if ($errors->has($Field['name']))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($Field['name']) }}</strong>
        </span>
    @endif
</div>
