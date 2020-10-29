<div class="form-group" style="margin:0;padding: 0 ">
    <label for="{{$Column['name']}}" class="hidden"></label>
    <input type="date" name="{{$Column['name']}}" style="margin: 0;padding: 0" id="{{$Column['name']}}" placeholder="{{__('crud.'.$lang.'.'.$Column['name'])}}" class="form-control" value="{{app('request')->input($Column['name'])}}">
</div>
