@extends('AhmedPanel.crud.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="{{ config('app.color') }}">
                    <h4 class="title">{{__('admin.edit')}} {{__(('crud.'.$lang.'.crud_the_name'))}}</h4>
                </div>
                <div class="card-content">
                    <form action="{{url($redirect.'/'.$Object->id)}}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PUT">
                        @csrf
                        <div class="row">
                            @foreach($Fields as $Field)
                                @if(isset($Field['editable']))
                                    @if($Field['editable'])
                                        @if($Field['type'] != 'multi_checkbox' && $Field['type'] != 'images')
                                            {!! \App\Traits\AhmedPanelTrait::Fields($Field,$Object->{$Field['name']},$lang) !!}
                                        @else
                                            {!! \App\Traits\AhmedPanelTrait::Fields($Field,$Object,$lang) !!}
                                        @endif
                                    @endif
                                @else
                                    @if($Field['type'] != 'multi_checkbox' && $Field['type'] != 'images')
                                        {!! \App\Traits\AhmedPanelTrait::Fields($Field,$Object->{$Field['name']},$lang) !!}
                                    @else
                                        {!! \App\Traits\AhmedPanelTrait::Fields($Field,$Object,$lang) !!}
                                    @endif
                                @endif
                            @endforeach
                        </div>
                        @if($lang == 'Admin')
                            <div class="row">
                                <div class="col-md-12" id="Roles">
                                    <label for="Roles" class="col-md-12">{{__('crud.Role.crud_names')}}</label>
                                    <script>let RolePermission =[];</script>
                                    @foreach(\App\Models\Role::all() as $role)
                                        <div class="col-md-3">
                                            <input type="checkbox" id="{{$role->getId()}}" name="roles[]" @if($Object->hasRole($role->getId())) checked @endif onchange="permissionCheck()" value="{{$role->getId()}}" class="role {{ $errors->has('roles') ? ' is-invalid' : '' }}">
                                            <label for="{{$role->getId()}}">{{$role->getName()}}</label>
                                        </div>
                                        <script>RolePermission['{{$role->getId()}}'] = [@foreach($role->role_permissions as $role_permission){{$role_permission->permission_id}} @if(!$loop->last),@endif @endforeach];</script>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="Permission">
                                    <label for="Permission" class="col-md-12">{{__('crud.Permission.crud_names')}}</label>
                                    @foreach(\App\Models\Permission::all() as $permission)
                                        <div class="form-group col-md-3">
                                            <input type="checkbox" id="permission{{$permission->getId()}}" name="permissions[]" @if($Object->hasPermission($permission->getId())) checked @endif value="{{$permission->getId()}}" class="permission {{ $errors->has('permissions') ? ' is-invalid' : '' }}">
                                            <label for="permission{{$permission->getId()}}">{{$permission->getName()}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="row submit-btn">
                            <button type="submit" class="btn btn-primary" style="margin-left:15px;margin-right:15px;">{{__('admin.save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        function permissionCheck() {
            let roleEls = document.getElementsByClassName('role');
            let permissionEls = document.getElementsByClassName('permission');
            for (let p = 0;p<permissionEls.length;p++){
                // permissionEls[p].checked=false;
                permissionEls[p].disabled=false;
            }
            for (let r = 0;r<roleEls.length;r++){
                let roleEl = roleEls[r];
                let permission = RolePermission[roleEl.id];
                for(let i = 0; i < permission.length; i++){
                    let permissionEl = document.getElementById('permission'+permission[i]);
                    if(roleEl.checked){
                        permissionEl.checked=true;
                        permissionEl.disabled=true;
                    }
                }
            }

        }
        permissionCheck();
    </script>
@endsection
