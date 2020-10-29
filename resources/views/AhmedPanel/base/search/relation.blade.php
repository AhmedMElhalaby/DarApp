<div class="form-group" style="margin:0;padding: 0 ">
    <label for="{{$Column['name']}}" class="hidden"></label>
    <select name="{{$Column['name']}}" style="margin: 0;padding: 0" id="{{$Column['name']}}" class="form-control">
        <option value="">-</option>
        @foreach($Column['relation']['data'] as $Model)
            <option value="{{$Model->id}}" @if(app('request')->input($Column['name']) == $Model->id) selected @endif>{{$Model[$Column['relation']['name']]}}</option>
        @endforeach
    </select>
</div>
