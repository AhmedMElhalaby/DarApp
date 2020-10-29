@extends('AhmedPanel.layouts.app')

@section('content')
{{--    <div class="row">--}}
{{--        <div class="col-lg-4 col-md-6 col-sm-6" onclick="window.location='{{url('admin/users')}}'" style="cursor: pointer">--}}
{{--            <div class="card card-stats">--}}
{{--                <div class="card-header" data-background-color="blue">--}}
{{--                    <i class="material-icons">person</i>--}}
{{--                </div>--}}
{{--                <div class="card-content">--}}
{{--                    <p class="category">مستخدمين</p>--}}
{{--                    <h3 class="title">{{\App\User::where('type',1)->count()}}</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-4 col-md-6 col-sm-6">--}}
{{--            <div class="card card-stats" onclick="window.location='{{url('admin/advertisements')}}'" style="cursor: pointer">--}}
{{--                <div class="card-header" data-background-color="orange">--}}
{{--                    <i class="material-icons">font_download</i>--}}
{{--                </div>--}}
{{--                <div class="card-content">--}}
{{--                    <p class="category">الإعلانات</p>--}}
{{--                    <h3 class="title">{{\App\Models\Advertisement::count()}}</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-4 col-md-6 col-sm-6" onclick="window.location='{{url('admin/categories')}}'" style="cursor: pointer">--}}
{{--            <div class="card card-stats">--}}
{{--                <div class="card-header" data-background-color="red">--}}
{{--                    <i class="material-icons">category</i>--}}
{{--                </div>--}}
{{--                <div class="card-content">--}}
{{--                    <p class="category">التصنيفات</p>--}}
{{--                    <h3 class="title">{{\App\Models\Category::where('parent',0)->count()}}</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="{{ config('app.color') }}">
                    <h4 class="title">  {{__('admin.Home.n_send_general')}} </h4>
                </div>
                <div class="card-content">
                    <form action="{{url('admin/notification/send')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 btn-group required">
                                <label for="title">{{__('admin.Home.n_title')}} :</label>
                                <input type="text" required="" name="title" id="title" class="form-control" placeholder="{{__('admin.Home.n_enter_title')}}">
                            </div>
                            <div class="col-md-5 btn-group required">
                                <label for="msg">{{__('admin.Home.n_text')}} :</label>
                                <input type="text" required="" name="msg" id="msg" class="form-control" placeholder="{{__('admin.Home.n_enter_text')}}">
                            </div>
                            <div class="col-md-2 btn-group required">
                                <label for="type">{{__('admin.Home.n_type')}} :</label>
                                <select required name="type" id="type" class="form-control">
                                    <option value="0">{{__('admin.Home.n_type_0')}}</option>
                                    <option value="1">{{__('admin.Home.n_type_1')}}</option>
                                    <option value="2">{{__('admin.Home.n_type_2')}}</option>
                                </select>
                            </div>
                            <div class="col-md-1 " style="margin-top: 50px">
                                <button type="submit" id="send" class="btn btn-primary">{{__('admin.Home.n_send')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
