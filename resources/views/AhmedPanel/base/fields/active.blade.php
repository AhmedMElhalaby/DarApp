<div class="col-md-12">
    <div class="form-group label-floating">
        <label for="{{$Field['name']}}" class="control-label">{{__('crud.'.$lang.'.'.$Field['name'])}} @if($Field['is_required'])*@endif</label>
        <select name="{{$Field['name']}}" style="margin: 0;padding: 0" id="{{$Field['name']}}" class="form-control">
            <option value="1" @if($value == '1') selected @endif>{{__('admin.activation.active')}}</option>
            <option value="0" @if($value == '0') selected @endif>{{__('admin.activation.in_active')}}</option>
        </select>
    </div>
    @if ($errors->has($Field['name']))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($Field['name']) }}</strong>
        </span>
    @endif
</div>
