<!doctype HTML>
<html lang="ar" data-color="{{ config('app.color') }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <!-- Bootstrap core CSS     -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('assets/css/material-dashboard.css')}}" rel="stylesheet"/>
    <!-- Bootstrap rtl CSS - from (http://github.com/morteza) -->
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/rtl.css')}}">
    @endif
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('assets/css/colors/'.config('app.color').'.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" />

    <title>{{config('app.name')}} - {{__('auth.login')}}</title>
</head>

<body>
<div class="container">
    <div class="row center-block mt-100">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="text-center bg-white border-rounded box-shadow">
                {{--<!--login form-->--}}
                <img src="{{asset('logo.png')}}" class="mt-50" width=""  alt="">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <form class="mt-50 text-center row" method="POST" action="{{ url('admin\login') }}">
                    @csrf
                    <div class="col-md-12 px-50 text-center">
                        <div class="form-group label-floating text-center">
                            <label class="control-label text-center" for="email">{{__('auth.email')}}</label>
                            <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" style="text-align: center" type="email" id="email" name="email" required>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-12 px-50 text-center">
                        <div class="form-group label-floating text-center">
                            <label class="control-label text-center" for="password">{{__('auth.password')}}</label>
                            <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" style="text-align: center" type="password" id="password" name="password" required>
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-12 text-center px-50">
                        <button class="btn  btn-primary btn-block lt-register-btn mt-50 mb-50" type="submit">{{__('auth.login')}}  </button>
                    </div>
                </form>
                <!--login form-->
            </div>
            <!--Login-->
        </div>
        <div class="col-md-3"></div>
        <!--center-block-->
    </div>
    <!--container-->
</div>


<!--   Core JS Files   -->
<script src="{{asset('assets/js/jquery-3.1.0.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/material.min.js')}}" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{{asset('assets/js/chartist.min.js')}}"></script>

<!--  Notification Plugin    -->
<script src="{{asset('assets/js/bootstrap-notify.js')}}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Material Dashboard javascript methods -->
<script src="{{asset('assets/js/material-dashboard.js')}}"></script>

<script src="{{asset('assets/js/custom.js')}}"></script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

</body>

</html>
