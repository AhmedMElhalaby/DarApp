<div class="form-group" style="margin:0;padding: 0 ">
    <label for="{{$Column['name']}}" class="hidden"></label>
    <select type="{{$Column['name']}}" name="{{$Column['name']}}" style="margin: 0;padding: 0" id="{{$Column['name']}}" class="form-control">
        <option value="" @if(app('request')->has($Column['name']) && app('request')->input($Column['name']) == '') selected @endif></option>
        @foreach($Column['data'] as $key => $value)
        <option value="{{$key}}" @if(app('request')->has($Column['name']) && app('request')->input($Column['name']) == $key) selected @endif>{{$value}}</option>
        @endforeach
    </select>
</div>
