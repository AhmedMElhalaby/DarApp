<li class="nav-item @if(url()->current() == url('/admin')) active @endif ">
    <a href="{{url('/admin')}}" class="nav-link">
        <i class="material-icons">dashboard</i>
        <p>{{__('admin.sidebar.home')}}</p>
    </a>
</li>
@if (auth('admin')->user()->can('Admins') ||auth('admin')->user()->can('Roles') ||auth('admin')->user()->can('Permissions'))
<li class="nav-item ">
    <a class="nav-link collapsed" data-toggle="collapse" href="#app_managements" aria-expanded="false">
        <i class="material-icons">keyboard_arrow_down</i>
        <p> {{__('admin.sidebar.app_managements')}}</p>
    </a>
    <div class="collapse @if(strpos(url()->current() , url('admin/app_managements'))===0) in @endif" id="app_managements" @if(strpos(url()->current() , url('admin/app_managements'))===0) aria-expanded="true" @endif>
        <ul class="nav">
            @if (auth('admin')->user()->can('Admins'))
                <li class="nav-item @if(strpos(url()->current() , url('admin/app_managements/admins'))===0) active @endif">
                    <a href="{{url('admin/app_managements/admins')}}" class="nav-link">
                        <i class="material-icons">group</i>
                        <p>{{__('admin.sidebar.admins')}}</p>
                    </a>
                </li>
            @endif
            @if (auth('admin')->user()->can('Roles'))
                <li class="nav-item @if(strpos(url()->current() , url('admin/app_managements/roles'))===0) active @endif">
                    <a href="{{url('admin/app_managements/roles')}}" class="nav-link">
                        <i class="material-icons">accessibility</i>
                        <p>{{__('admin.sidebar.roles')}}</p>
                    </a>
                </li>
            @endif
            @if (auth('admin')->user()->can('Permissions'))
                <li class="nav-item @if(strpos(url()->current() , url('admin/app_managements/permissions'))===0) active @endif">
                    <a href="{{url('admin/app_managements/permissions')}}" class="nav-link">
                        <i class="material-icons">vpn_key</i>
                        <p>{{__('admin.sidebar.permissions')}}</p>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</li>
@endif
@if (auth('admin')->user()->can('Settings') || auth('admin')->user()->can('Faqs') || auth('admin')->user()->can('BankAccounts'))
<li class="nav-item ">
    <a class="nav-link collapsed" data-toggle="collapse" href="#app_data" aria-expanded="false">
        <i class="material-icons">keyboard_arrow_down</i>
        <p> {{__('admin.sidebar.app_data')}}</p>
    </a>
    <div class="collapse @if(strpos(url()->current() , url('admin/app_data'))===0) in @endif" id="app_data" @if(strpos(url()->current() , url('admin/app_data'))===0) aria-expanded="true" @endif>
        <ul class="nav">
            @if (auth('admin')->user()->can('Settings'))
                <li class="nav-item @if(strpos(url()->current() , url('admin/app_data/settings'))===0) active @endif">
                    <a href="{{url('admin/app_data/settings')}}" class="nav-link">
                        <i class="material-icons">settings</i>
                        <p>{{__('admin.sidebar.settings')}}</p>
                    </a>
                </li>
            @endif
            @if (auth('admin')->user()->can('Faqs'))
                <li class="nav-item @if(strpos(url()->current() , url('admin/app_data/faqs'))===0) active @endif">
                    <a href="{{url('admin/app_data/faqs')}}" class="nav-link">
                        <i class="material-icons">help</i>
                        <p>{{__('admin.sidebar.faqs')}}</p>
                    </a>
                </li>
            @endif
{{--            @if (auth('admin')->user()->can('BankAccounts'))--}}
{{--                <li class="nav-item @if(strpos(url()->current() , url('admin/app_data/bank_accounts'))===0) active @endif">--}}
{{--                    <a href="{{url('admin/app_data/bank_accounts')}}" class="nav-link">--}}
{{--                        <i class="material-icons">payments</i>--}}
{{--                        <p>{{__('admin.sidebar.bank_accounts')}}</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endif--}}
        </ul>
    </div>
</li>
@endif
@if (auth('admin')->user()->can('Users') || auth('admin')->user()->can('Tickets') )
    <li class="nav-item ">
        <a class="nav-link collapsed" data-toggle="collapse" href="#user_managements" aria-expanded="false">
            <i class="material-icons">keyboard_arrow_down</i>
            <p> {{__('admin.sidebar.user_managements')}}</p>
        </a>
        <div class="collapse @if(strpos(url()->current() , url('admin/user_managements'))===0) in @endif" id="user_managements" @if(strpos(url()->current() , url('admin/user_managements'))===0) aria-expanded="true" @endif>
            <ul class="nav">
                @if (auth('admin')->user()->can('Users'))
                    <li class="nav-item @if(strpos(url()->current() , url('admin/user_managements/users'))===0) active @endif">
                        <a href="{{url('admin/user_managements/users')}}" class="nav-link">
                            <i class="material-icons">group</i>
                            <p>{{__('admin.sidebar.users')}}</p>
                        </a>
                    </li>
                @endif
                @if (auth('admin')->user()->can('Tickets'))
                    <li class="nav-item @if(strpos(url()->current() , url('admin/user_managements/tickets'))===0) active @endif">
                        <a href="{{url('admin/user_managements/tickets')}}" class="nav-link">
                            <i class="material-icons">label</i>
                            <p>{{__('admin.sidebar.tickets')}}</p>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </li>
@endif
