<div class="col-md-12">
    <label for="{{$Field['name']}}" class="col-md-12">{{__('crud.'.$lang.'.'.$Field['name'])}}</label>
    @foreach($Field['custom']['ListModel']['Model'] as $Model)
        <div class="form-group col-md-3">
            <input type="checkbox" id="{{$Field['name'].$Model[$Field['custom']['ListModel']['id']]}}"  @if($Field['custom']['CheckFunc']($value,$Model[$Field['custom']['ListModel']['id']])) checked @endif name="{{$Field['name']}}[]" value="{{$Model[$Field['custom']['ListModel']['id']]}}" class="{{ $errors->has($Field['name'].$Model[$Field['custom']['ListModel']['name']]) ? ' is-invalid' : '' }}">
            <label for="{{$Field['name'].$Model[$Field['custom']['ListModel']['id']]}}">{{$Model[$Field['custom']['ListModel']['name']]}}</label>
        </div>
        @if ($errors->has($Field['name'].$Model[$Field['custom']['ListModel']['id']]))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first($Field['name'].$Model[$Field['custom']['ListModel']['id']]) }}</strong>
            </span>
        @endif
    @endforeach
</div>
