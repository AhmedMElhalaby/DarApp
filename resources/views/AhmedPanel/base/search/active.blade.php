<div class="form-group" style="margin:0;padding: 0 ">
    <label for="{{$Column['name']}}" class="hidden"></label>
    <select type="{{$Column['name']}}" name="{{$Column['name']}}" style="margin: 0;padding: 0" id="{{$Column['name']}}" class="form-control">
        <option value="" @if(app('request')->has($Column['name']) && app('request')->input($Column['name']) == '') selected @endif>-</option>
        <option value="1" @if(app('request')->has($Column['name']) && app('request')->input($Column['name']) == '1') selected @endif>{{__('admin.activation.active')}}</option>
        <option value="0" @if(app('request')->has($Column['name']) && app('request')->input($Column['name']) == '0') selected @endif>{{__('admin.activation.in_active')}}</option>
    </select>
</div>
