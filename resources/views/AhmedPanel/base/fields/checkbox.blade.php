<div class="form-group col-md-3">
    <input type="checkbox" id="{{$Field['name']}}"  @if($value) checked @endif name="{{$Field['name']}}" value="1" class="{{ $errors->has($Field['name']) ? ' is-invalid' : '' }}">
    <label for="{{$Field['name']}}">{{__('crud.'.$lang.'.'.$Field['name'])}}</label>
</div>
@if ($errors->has($Field['name']))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first($Field['name']) }}</strong>
    </span>
@endif

