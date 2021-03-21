
<!DOCTYPE html>
<html lang="en" data-color="{{ config('app.color') }}">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('logo.png')}}" />
    <link rel="icon" type="image/png" href="{{asset('public/logo.png')}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('assets/css/material-dashboard.css')}}" rel="stylesheet"/>
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/rtl.css')}}">
    @endif
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link href="{{asset('assets/css/colors/'.config('app.color').'.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" />
    @yield('style')
</head>

<body>

<div class="wrapper">

    <div class="sidebar" data-color="{{ config('app.color') }}" data-image="{{asset('assets/img/sidebar-1.jpg')}}">
        <div class="logo" style="text-align: center">
            <img onclick="window.location ='{{url('/admin')}}'" src="{{asset('logo.png')}}" width="180px" style="cursor: pointer" alt="">

        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
               @include('AhmedPanel.layouts.sidebar')
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    {{--<a class="navbar-brand" href="#"></a>--}}
                </div>
                <div class="collapse navbar-collapse" >
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            @yield('head-icon')
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="{{url('admin/app/lang')}}" style="display: inline-block;">
                                <i class="material-icons text-primary" data-toggle="tooltip" data-placement="bottom" title="{{__('admin.switch_lang')}}" style="font-size: 30px">g_translate</i>
                                <p class="hidden-lg hidden-md">Language</p>
                            </a>
                            <a href="{{url('admin.logout')}}" style="display: inline-block;" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="material-icons text-primary" data-toggle="tooltip" data-placement="bottom" title="{{__('auth.logout')}}" style="font-size: 30px">logout</i>
                                <p class="hidden-lg hidden-md">logout</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')

            </div>
        </div>
    </div>
</div>
@yield('out-content')

</body>

<!--   Core JS Files   -->
<script src="{{asset('assets/js/jquery-3.1.0.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/material.min.js')}}" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{{asset('assets/js/chartist.min.js')}}"></script>

<!--  Notification Plugin    -->
<script src="{{asset('assets/js/bootstrap-notify.js')}}"></script>

<!-- Material Dashboard javascript methods -->
<script src="{{asset('assets/js/material-dashboard.js')}}"></script>

<script src="{{asset('assets/js/custom.js')}}"></script>

@yield('script')


</html>
