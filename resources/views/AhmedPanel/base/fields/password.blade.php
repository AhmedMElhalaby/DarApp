 <div class="@if(isset($Field['confirmation']) && $Field['confirmation']) col-md-6 @else col-md-12 @endif">
    <div class="form-group label-floating">
        <label for="{{$Field['name']}}" class="control-label">{{__('admin.passwords.password')}} @if($Field['is_required'])*@endif</label>
        <input type="password" id="{{$Field['name']}}" name="{{$Field['name']}}" @if($Field['is_required']) required @endif class="form-control {{ $errors->has($Field['name']) ? ' is-invalid' : '' }}" value="{{$value}}">
    </div>
    @if ($errors->has($Field['name']))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($Field['name']) }}</strong>
        </span>
    @endif
</div>
 @if(isset($Field['confirmation']) && $Field['confirmation'])
     <div class="col-md-6">
         <div class="form-group label-floating">
             <label for="password_confirmation" class="control-label">{{__(__('admin.passwords.password_confirmation'))}} @if($Field['is_required'])*@endif</label>
             <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" >
         </div>
         @if ($errors->has('password_confirmation'))
             <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
         @endif
     </div>
 @endif
