@extends('AhmedPanel.crud.main')
@section('style')
    <style>
        #map {
            width: 100%;
            height: 500px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{url($redirect)}}" method="post" enctype="multipart/form-data" class="card">
                @csrf
                <div class="card-header card-header-tabs card-header-primary" data-background-color="{{ config('app.color') }}">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
{{--                            <span class="nav-tabs-title">{{__('admin.add')}} {{__('crud.'.$lang.'.crud_name')}} </span>--}}
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item active">
                                    <a class="nav-link active show" id="basic_info_tab" href="#basic_info" data-toggle="tab">
                                        <i class="material-icons">bug_report</i> {{__('crud.'.$lang.'.Tabs.basic_info')}}
                                        <div class="ripple-container"></div>
                                        <div class="ripple-container"></div>
                                     </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="estate_details_tab" href="#estate_details" data-toggle="tab">
                                        <i class="material-icons">code</i> {{__('crud.'.$lang.'.Tabs.estate_details')}}
                                        <div class="ripple-container"></div>
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="estate_media_tab" href="#estate_media" data-toggle="tab">
                                        <i class="material-icons">cloud</i> {{__('crud.'.$lang.'.Tabs.estate_media')}}
                                        <div class="ripple-container"></div>
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="payment_and_contact_tab" href="#payment_and_contact" data-toggle="tab">
                                        <i class="material-icons">cloud</i> {{__('crud.'.$lang.'.Tabs.payment_and_contact')}}
                                        <div class="ripple-container"></div>
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="tab-content">
                        <div class="tab-pane active" id="basic_info">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label for="user_id" class="control-label">{{__('crud.'.$lang.'.user_id')}} *</label>
                                        <select name="user_id" required style="margin: 0;padding: 0" id="user_id" class="form-control">
                                            @foreach(\App\Models\User::all() as $user)
                                                <option value="{{$user->getId()}}" @if(old('user_id') == $user->getId()) selected @endif>{{$user->getName()}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('user_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label for="estate_type" class="control-label">{{__('crud.'.$lang.'.estate_type')}} *</label>
                                        <select name="estate_type" required style="margin: 0;padding: 0" id="estate_type" class="form-control">
                                            @foreach(\App\Models\EstateType::all() as $estate_type)
                                                <option value="{{$estate_type->getId()}}" @if(old('estate_type') == $estate_type->getId()) selected @endif>{{app()->getLocale() == 'ar'?$estate_type->getNameAr():$estate_type->getName()}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('estate_type'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('estate_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label for="estate_offer_type" class="control-label">{{__('crud.'.$lang.'.estate_offer_type')}} *</label>
                                        <select name="estate_offer_type" required style="margin: 0;padding: 0" id="estate_offer_type" class="form-control">
                                            @foreach(\App\Helpers\Constant::ESTATE_OFFER_TYPE as $type)
                                                <option value="{{$type}}" @if(old('estate_offer_type') == $type) selected @endif>{{__('crud.'.$lang.'.EstateOfferTypes.'.$type)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('estate_offer_type'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('estate_offer_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label for="city_id" class="control-label">{{__('crud.'.$lang.'.city_id')}} *</label>
                                        <select name="city_id" required style="margin: 0;padding: 0" id="city_id" class="form-control">
                                            @foreach(\App\Models\City::where('is_active',true)->get() as $city)
                                                <option value="{{$city->getId()}}" @if(old('city_id') == $city->getId()) selected @endif>{{(app()->getLocale() =='ar')?$city->getNameAr():$city->getName()}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('city_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label for="area_id" class="control-label">{{__('crud.'.$lang.'.area_id')}} *</label>
                                        <select name="area_id" required style="margin: 0;padding: 0" id="area_id" class="form-control">
                                        </select>
                                    </div>
                                    @if ($errors->has('area_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('area_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label for="street" class="control-label">{{__('crud.'.$lang.'.street')}}</label>
                                        <input type="text" name="street" style="margin: 0;padding: 0" id="street" class="form-control" value="{{old('street')}}">
                                    </div>
                                    @if ($errors->has('street'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label for="estate_area" class="control-label">{{__('crud.'.$lang.'.estate_area')}} *</label>
                                        <input type="text" name="estate_area" style="margin: 0;padding: 0" id="estate_area" class="form-control" value="{{old('estate_area')}}">
                                    </div>
                                    @if ($errors->has('estate_area'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('estate_area') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label for="price" class="control-label">{{__('crud.'.$lang.'.price')}} *</label>
                                        <input type="text" name="price" style="margin: 0;padding: 0" id="price" class="form-control" value="{{old('price')}}">
                                    </div>
                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group label-floating">
                                        <label for="currency_id" class="control-label">{{__('crud.'.$lang.'.currency_id')}} *</label>
                                        <select name="currency_id" required style="margin: 0;padding: 0" id="currency_id" class="form-control">
                                            @foreach(\App\Models\Currency::where('is_active',true)->get() as $currency)
                                                <option value="{{$currency->getId()}}" @if(old('currency_id') == $currency->getId()) selected @endif>{{(app()->getLocale() =='ar')?$currency->getNameAr():$currency->getName()}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('currency_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('currency_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row submit-btn">
                                <button type="button" class="btn btn-primary" onclick="document.getElementById('estate_details_tab').click()" style="margin-left:15px;margin-right:15px;">{{__('admin.next')}}</button>
                            </div>
                        </div>
                        <div class="tab-pane" id="estate_details">
                            <div class="row">
                                <div class="col-md-4 estate_details" id="land_area_div">
                                    <div class="form-group label-floating">
                                        <label for="land_area" class="control-label">{{__('crud.'.$lang.'.land_area')}} *</label>
                                        <input type="text" name="land_area" style="margin: 0;padding: 0" id="land_area" class="form-control" value="{{old('land_area')}}">
                                    </div>
                                    @if ($errors->has('land_area'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('land_area') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4 estate_details" id="building_area_div">
                                    <div class="form-group label-floating">
                                        <label for="building_area" class="control-label">{{__('crud.'.$lang.'.building_area')}} *</label>
                                        <input type="text" name="building_area" style="margin: 0;padding: 0" id="building_area" class="form-control" value="{{old('building_area')}}">
                                    </div>
                                    @if ($errors->has('building_area'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('building_area') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4 estate_details" id="building_age_div">
                                    <div class="form-group label-floating">
                                        <label for="building_age" class="control-label">{{__('crud.'.$lang.'.building_age')}} *</label>
                                        <input type="text" name="building_age" style="margin: 0;padding: 0" id="building_age" class="form-control" value="{{old('building_age')}}">
                                    </div>
                                    @if ($errors->has('building_age'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('building_age') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4 estate_details" id="apartment_area_div">
                                    <div class="form-group label-floating">
                                        <label for="apartment_area" class="control-label">{{__('crud.'.$lang.'.apartment_area')}} *</label>
                                        <input type="text" name="apartment_area" style="margin: 0;padding: 0" id="apartment_area" class="form-control" value="{{old('apartment_area')}}">
                                    </div>
                                    @if ($errors->has('apartment_area'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apartment_area') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4 estate_details" id="apartment_floor_div">
                                    <div class="form-group label-floating">
                                        <label for="apartment_floor" class="control-label">{{__('crud.'.$lang.'.apartment_floor')}} *</label>
                                        <input type="text" name="apartment_floor" style="margin: 0;padding: 0" id="apartment_floor" class="form-control" value="{{old('apartment_floor')}}">
                                    </div>
                                    @if ($errors->has('apartment_floor'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apartment_floor') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 estate_details" id="land_interface_div">
                                    <div class="form-group label-floating">
                                        <label for="land_interface" class="control-label">{{__('crud.'.$lang.'.land_interface')}} *</label>
                                        <input type="text" name="land_interface" style="margin: 0;padding: 0" id="land_interface" class="form-control" value="{{old('land_interface')}}">
                                    </div>
                                    @if ($errors->has('land_interface'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('land_interface') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 estate_details" id="shop_length_area_div">
                                    <div class="form-group label-floating">
                                        <label for="shop_length_area" class="control-label">{{__('crud.'.$lang.'.shop_length_area')}} *</label>
                                        <input type="text" name="shop_length_area" style="margin: 0;padding: 0" id="shop_length_area" class="form-control" value="{{old('shop_length_area')}}">
                                    </div>
                                    @if ($errors->has('shop_length_area'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('shop_length_area') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6 estate_details" id="shop_width_area_div">
                                    <div class="form-group label-floating">
                                        <label for="shop_width_area" class="control-label">{{__('crud.'.$lang.'.shop_width_area')}} *</label>
                                        <input type="text" name="shop_width_area" style="margin: 0;padding: 0" id="shop_width_area" class="form-control" value="{{old('shop_width_area')}}">
                                    </div>
                                    @if ($errors->has('shop_width_area'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('shop_width_area') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 estate_details" id="room_no_div">
                                    <div class="form-group label-floating">
                                        <label for="room_no" class="control-label">{{__('crud.'.$lang.'.room_no')}} *</label>
                                        <input type="text" name="room_no" style="margin: 0;padding: 0" id="room_no" class="form-control" value="{{old('room_no')}}">
                                    </div>
                                    @if ($errors->has('room_no'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('room_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3 estate_details" id="bathroom_no_div">
                                    <div class="form-group label-floating">
                                        <label for="bathroom_no" class="control-label">{{__('crud.'.$lang.'.bathroom_no')}} *</label>
                                        <input type="text" name="bathroom_no" style="margin: 0;padding: 0" id="bathroom_no" class="form-control" value="{{old('bathroom_no')}}">
                                    </div>
                                    @if ($errors->has('bathroom_no'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bathroom_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3 estate_details" id="halls_no_div">
                                    <div class="form-group label-floating">
                                        <label for="halls_no" class="control-label">{{__('crud.'.$lang.'.halls_no')}} *</label>
                                        <input type="text" name="halls_no" style="margin: 0;padding: 0" id="halls_no" class="form-control" value="{{old('halls_no')}}">
                                    </div>
                                    @if ($errors->has('halls_no'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('halls_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3 estate_details" id="floors_no_div">
                                    <div class="form-group label-floating">
                                        <label for="floors_no" class="control-label">{{__('crud.'.$lang.'.floors_no')}} *</label>
                                        <input type="text" name="floors_no" style="margin: 0;padding: 0" id="floors_no" class="form-control" value="{{old('floors_no')}}">
                                    </div>
                                    @if ($errors->has('floors_no'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('floors_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 estate_details" id="finishing_type_div">
                                    <div class="form-group label-floating">
                                        <label for="finishing_type" class="control-label">{{__('crud.'.$lang.'.finishing_type')}} *</label>
                                        <select name="finishing_type" required style="margin: 0;padding: 0" id="finishing_type" class="form-control">
                                            @foreach(\App\Helpers\Constant::FINISHING_TYPE as $type)
                                                <option value="{{$type}}" @if(old('finishing_type') == $type) selected @endif>{{__('crud.'.$lang.'.FinishingTypes.'.$type)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('finishing_type'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('finishing_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 estate_details" id="description_div">
                                    <div class="form-group label-floating">
                                        <label for="description" class="control-label">{{__('crud.'.$lang.'.description')}} </label>
                                        <textarea type="text" name="description" style="margin: 0;padding: 0" id="description" class="form-control">{{old('description')}}</textarea>
                                    </div>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 estate_details" id="has_garage_div">
                                    <div class="form-group">
                                        <label for="has_garage" class="control-label">{{__('crud.'.$lang.'.has_garage')}}</label>
                                        <input type="checkbox" id="has_garage"  @if(old('has_garage')) checked @endif  name="has_garage" class=" {{ $errors->has('has_garage') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('has_garage'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('has_garage') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3 estate_details" id="has_well_div">
                                    <div class="form-group">
                                        <label for="has_well" class="control-label">{{__('crud.'.$lang.'.has_well')}}</label>
                                        <input type="checkbox" id="has_well"  @if(old('has_well')) checked @endif  name="has_well" class=" {{ $errors->has('has_well') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('has_well'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('has_well') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3 estate_details" id="has_public_street_view_div">
                                    <div class="form-group">
                                        <label for="has_public_street_view" class="control-label">{{__('crud.'.$lang.'.has_public_street_view')}}</label>
                                        <input type="checkbox" id="has_public_street_view"  @if(old('has_public_street_view')) checked @endif  name="has_public_street_view" class=" {{ $errors->has('has_public_street_view') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('has_public_street_view'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('has_public_street_view') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3 estate_details" id="has_sea_view_div">
                                    <div class="form-group">
                                        <label for="has_sea_view" class="control-label">{{__('crud.'.$lang.'.has_sea_view')}}</label>
                                        <input type="checkbox" id="has_sea_view"  @if(old('has_sea_view')) checked @endif  name="has_sea_view" class=" {{ $errors->has('has_sea_view') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('has_sea_view'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('has_sea_view') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 estate_details" id="elementary_schools_no_div">
                                    <div class="form-group label-floating">
                                        <label for="elementary_schools_no" class="control-label">{{__('crud.'.$lang.'.elementary_schools_no')}} </label>
                                        <input type="text" name="elementary_schools_no" style="margin: 0;padding: 0" id="elementary_schools_no" class="form-control" value="{{old('elementary_schools_no')}}">
                                    </div>
                                    @if ($errors->has('elementary_schools_no'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('elementary_schools_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3 estate_details" id="preparatory_schools_no_div">
                                    <div class="form-group label-floating">
                                        <label for="preparatory_schools_no" class="control-label">{{__('crud.'.$lang.'.preparatory_schools_no')}} </label>
                                        <input type="text" name="preparatory_schools_no" style="margin: 0;padding: 0" id="preparatory_schools_no" class="form-control" value="{{old('preparatory_schools_no')}}">
                                    </div>
                                    @if ($errors->has('preparatory_schools_no'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('preparatory_schools_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3 estate_details" id="secondary_schools_no_div">
                                    <div class="form-group label-floating">
                                        <label for="secondary_schools_no" class="control-label">{{__('crud.'.$lang.'.secondary_schools_no')}} </label>
                                        <input type="text" name="secondary_schools_no" style="margin: 0;padding: 0" id="secondary_schools_no" class="form-control" value="{{old('secondary_schools_no')}}">
                                    </div>
                                    @if ($errors->has('secondary_schools_no'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('secondary_schools_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3 estate_details" id="kindergarten_no_div">
                                    <div class="form-group label-floating">
                                        <label for="kindergarten_no" class="control-label">{{__('crud.'.$lang.'.kindergarten_no')}} </label>
                                        <input type="text" name="kindergarten_no" style="margin: 0;padding: 0" id="kindergarten_no" class="form-control" value="{{old('kindergarten_no')}}">
                                    </div>
                                    @if ($errors->has('kindergarten_no'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kindergarten_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 estate_details" id="pharmacy_no_div">
                                    <div class="form-group">
                                        <label for="pharmacy_no" class="control-label">{{__('crud.'.$lang.'.pharmacy_no')}}</label>
                                        <input type="checkbox" id="pharmacy_no"  @if(old('pharmacy_no')) checked @endif  name="has_garage" class=" {{ $errors->has('pharmacy_no') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('pharmacy_no'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pharmacy_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-2 estate_details" id="mosque_no_div">
                                    <div class="form-group">
                                        <label for="mosque_no" class="control-label">{{__('crud.'.$lang.'.mosque_no')}}</label>
                                        <input type="checkbox" id="mosque_no"  @if(old('mosque_no')) checked @endif  name="mosque_no" class=" {{ $errors->has('mosque_no') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('mosque_no'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mosque_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-2 estate_details" id="hospital_no_div">
                                    <div class="form-group">
                                        <label for="hospital_no" class="control-label">{{__('crud.'.$lang.'.hospital_no')}}</label>
                                        <input type="checkbox" id="hospital_no"  @if(old('hospital_no')) checked @endif  name="hospital_no" class=" {{ $errors->has('hospital_no') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('hospital_no'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hospital_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-2 estate_details" id="bakery_no_div">
                                    <div class="form-group">
                                        <label for="bakery_no" class="control-label">{{__('crud.'.$lang.'.bakery_no')}}</label>
                                        <input type="checkbox" id="bakery_no"  @if(old('bakery_no')) checked @endif  name="bakery_no" class=" {{ $errors->has('bakery_no') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('bakery_no'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bakery_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-2 estate_details" id="mall_no_div">
                                    <div class="form-group">
                                        <label for="mall_no" class="control-label">{{__('crud.'.$lang.'.mall_no')}}</label>
                                        <input type="checkbox" id="mall_no"  @if(old('mall_no')) checked @endif  name="mall_no" class=" {{ $errors->has('mall_no') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('mall_no'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mall_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 estate_details" id="is_residential_div">
                                    <div class="form-group">
                                        <label for="is_residential" class="control-label">{{__('crud.'.$lang.'.is_residential')}}</label>
                                        <input type="checkbox" id="is_residential"  @if(old('is_residential')) checked @endif  name="is_residential" class=" {{ $errors->has('is_residential') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('is_residential'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('is_residential') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3 estate_details" id="is_agricultural_div">
                                    <div class="form-group">
                                        <label for="is_agricultural" class="control-label">{{__('crud.'.$lang.'.is_agricultural')}}</label>
                                        <input type="checkbox" id="is_agricultural"  @if(old('is_agricultural')) checked @endif  name="is_agricultural" class=" {{ $errors->has('is_agricultural') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('is_agricultural'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('is_agricultural') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3 estate_details" id="is_commercial_div">
                                    <div class="form-group">
                                        <label for="is_commercial" class="control-label">{{__('crud.'.$lang.'.is_commercial')}}</label>
                                        <input type="checkbox" id="is_commercial"  @if(old('is_commercial')) checked @endif  name="is_commercial" class=" {{ $errors->has('is_commercial') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('is_commercial'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('is_commercial') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3 estate_details" id="is_industrial_div">
                                    <div class="form-group">
                                        <label for="is_industrial" class="control-label">{{__('crud.'.$lang.'.is_industrial')}}</label>
                                        <input type="checkbox" id="is_industrial"  @if(old('is_industrial')) checked @endif  name="is_industrial" class=" {{ $errors->has('is_industrial') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('is_industrial'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('is_industrial') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 estate_details" id="is_taboo_div">
                                    <div class="form-group label-floating">
                                        <label for="is_taboo" class="control-label">{{__('crud.'.$lang.'.is_taboo')}} *</label>
                                        <select name="is_taboo" required style="margin: 0;padding: 0" id="is_taboo" class="form-control">
                                            <option value="1" @if(old('is_taboo') == 1) selected @endif>{{__('admin.yes')}}</option>
                                            <option value="0" @if(old('is_taboo') == 0) selected @endif>{{__('admin.no')}}</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('is_taboo'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('is_taboo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 estate_details" id="has_attic_div">
                                    <div class="form-group label-floating">
                                        <label for="has_attic" class="control-label">{{__('crud.'.$lang.'.has_attic')}} *</label>
                                        <select name="has_attic" required style="margin: 0;padding: 0" id="has_attic" class="form-control">
                                            <option value="1" @if(old('has_attic') == 1) selected @endif>{{__('admin.yes')}}</option>
                                            <option value="0" @if(old('has_attic') == 0) selected @endif>{{__('admin.no')}}</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('has_attic'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('has_attic') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row submit-btn">
                                <button type="button" class="btn btn-primary" onclick="document.getElementById('estate_media_tab').click()" style="margin-left:15px;margin-right:15px;">{{__('admin.next')}}</button>
                                <button type="button" class="btn btn-primary" onclick="document.getElementById('basic_info_tab').click()" style="margin-left:15px;margin-right:15px;">{{__('admin.previous')}}</button>
                            </div>
                        </div>
                        <div class="tab-pane" id="estate_media">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="estate_media" class="control-label">{{__('crud.'.$lang.'.estate_media')}} </label>
                                    <input type="file" required name="estate_media[]" id="estate_media" multiple class="">
                                    @if ($errors->has('estate_media'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('estate_media') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="neighborhood_media" class="control-label">{{__('crud.'.$lang.'.neighborhood_media')}} </label>
                                    <input type="file" required name="neighborhood_media[]" id="neighborhood_media" multiple class="">
                                    @if ($errors->has('neighborhood_media'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('neighborhood_media') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row submit-btn">
                                <button type="button" class="btn btn-primary" onclick="document.getElementById('payment_and_contact_tab').click()" style="margin-left:15px;margin-right:15px;">{{__('admin.next')}}</button>
                                <button type="button" class="btn btn-primary" onclick="document.getElementById('estate_details_tab').click()" style="margin-left:15px;margin-right:15px;">{{__('admin.previous')}}</button>
                            </div>
                        </div>
                        <div class="tab-pane" id="payment_and_contact">
                            <div class="row">
                                <div class="col-md-4" id="is_payment_type_cash_div">
                                    <div class="form-group">
                                        <label for="is_payment_type_cash" class="control-label">{{__('crud.'.$lang.'.is_payment_type_cash')}}</label>
                                        <input type="checkbox" id="is_payment_type_cash"  @if(old('is_payment_type_cash')) checked @endif  name="is_payment_type_cash" class=" {{ $errors->has('is_payment_type_cash') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('is_payment_type_cash'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('is_payment_type_cash') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4" id="is_payment_type_installment_div">
                                    <div class="form-group">
                                        <label for="is_payment_type_installment" class="control-label">{{__('crud.'.$lang.'.is_payment_type_installment')}}</label>
                                        <input type="checkbox" id="is_payment_type_installment"  @if(old('is_payment_type_installment')) checked @endif  name="is_payment_type_installment" class=" {{ $errors->has('is_payment_type_installment') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('is_payment_type_installment'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('is_payment_type_installment') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4" id="is_payment_type_switching_div">
                                    <div class="form-group">
                                        <label for="is_payment_type_switching" class="control-label">{{__('crud.'.$lang.'.is_payment_type_switching')}}</label>
                                        <input type="checkbox" id="is_payment_type_switching"  @if(old('is_payment_type_switching')) checked @endif  name="is_payment_type_switching" class=" {{ $errors->has('is_payment_type_switching') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('is_payment_type_switching'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('is_payment_type_switching') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="contact_name_div">
                                    <div class="form-group label-floating">
                                        <label for="contact_name" class="control-label">{{__('crud.'.$lang.'.contact_name')}} </label>
                                        <input type="text" name="contact_name" style="margin: 0;padding: 0" id="contact_name" class="form-control" value="{{old('contact_name')}}">
                                    </div>
                                    @if ($errors->has('contact_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" id="contact_identity_div">
                                    <div class="form-group label-floating">
                                        <label for="contact_identity" class="control-label">{{__('crud.'.$lang.'.contact_identity')}} </label>
                                        <input type="text" name="contact_identity" style="margin: 0;padding: 0" id="contact_identity" class="form-control" value="{{old('contact_identity')}}">
                                    </div>
                                    @if ($errors->has('contact_identity'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_identity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4" id="contact_mobile1_div">
                                    <div class="form-group label-floating">
                                        <label for="contact_mobile1" class="control-label">{{__('crud.'.$lang.'.contact_mobile1')}} *</label>
                                        <input type="text" name="contact_mobile1" style="margin: 0;padding: 0" id="contact_mobile1" class="form-control" value="{{old('contact_mobile1')}}">
                                    </div>
                                    @if ($errors->has('contact_mobile1'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_mobile1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4" id="contact_mobile2_div">
                                    <div class="form-group label-floating">
                                        <label for="contact_mobile2" class="control-label">{{__('crud.'.$lang.'.contact_mobile2')}} </label>
                                        <input type="text" name="contact_mobile2" style="margin: 0;padding: 0" id="contact_mobile2" class="form-control" value="{{old('contact_mobile2')}}">
                                    </div>
                                    @if ($errors->has('contact_mobile2'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_mobile2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" id="lat_div">
                                    <div class="form-group label-floating">
                                        <label for="lat" class="control-label">{{__('crud.'.$lang.'.lat')}}</label>
                                        <input type="text" name="lat" style="margin: 0;padding: 0" id="lat" class="form-control" value="{{old('lat')}}">
                                    </div>
                                    @if ($errors->has('lat'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lat') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6" id="lng_div">
                                    <div class="form-group label-floating">
                                        <label for="lng" class="control-label">{{__('crud.'.$lang.'.lng')}}</label>
                                        <input type="text" name="lng" style="margin: 0;padding: 0" id="lng" class="form-control" value="{{old('lng')}}">
                                    </div>
                                    @if ($errors->has('lng'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lng') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div id="map"></div>
                            </div>
                            <div class="row submit-btn">
                                <button type="submit" class="btn btn-primary" style="margin-left:15px;margin-right:15px;">{{__('admin.save')}}</button>
                                <button type="button" class="btn btn-primary" onclick="document.getElementById('estate_media_tab').click()" style="margin-left:15px;margin-right:15px;">{{__('admin.previous')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on('change','#estate_type',function (){
            let type = $(this).val();
            $('.estate_details').hide();
            $.get('{{url('admin/estate_type')}}',{estate_type:type},function (response){
                let data = response.EstateType;
                if (data.land_area === "1"){$('#land_area_div').show();}
                if (data.building_area === "1"){$('#building_area_div').show();}
                if (data.building_age === "1"){$('#building_age_div').show();}
                if (data.apartment_area === "1"){$('#apartment_area_div').show();}
                if (data.apartment_floor === "1"){$('#apartment_floor_div').show();}
                if (data.land_interface === "1"){$('#land_interface_div').show();}
                if (data.shop_length_area === "1"){$('#shop_length_area_div').show();}
                if (data.shop_width_area === "1"){$('#shop_width_area_div').show();}
                if (data.room_no === "1"){$('#room_no_div').show();}
                if (data.bathroom_no === "1"){$('#bathroom_no_div').show();}
                if (data.halls_no === "1"){$('#halls_no_div').show();}
                if (data.floors_no === "1"){$('#floors_no_div').show();}
                if (data.finishing_type === "1"){$('#finishing_type_div').show();}
                if (data.description === "1"){$('#description_div').show();}
                if (data.has_garage === "1"){$('#has_garage_div').show();}
                if (data.has_well === "1"){$('#has_well_div').show();}
                if (data.has_public_street_view === "1"){$('#has_public_street_view_div').show();}
                if (data.has_sea_view === "1"){$('#has_sea_view_div').show();}
                if (data.elementary_schools_no === "1"){$('#elementary_schools_no_div').show();}
                if (data.preparatory_schools_no === "1"){$('#preparatory_schools_no_div').show();}
                if (data.secondary_schools_no === "1"){$('#secondary_schools_no_div').show();}
                if (data.kindergarten_no === "1"){$('#kindergarten_no_div').show();}
                if (data.pharmacy_no === "1"){$('#pharmacy_no_div').show();}
                if (data.mosque_no === "1"){$('#mosque_no_div').show();}
                if (data.hospital_no === "1"){$('#hospital_no_div').show();}
                if (data.bakery_no === "1"){$('#bakery_no_div').show();}
                if (data.mall_no === "1"){$('#mall_no_div').show();}
                if (data.is_residential === "1"){$('#is_residential_div').show();}
                if (data.is_agricultural === "1"){$('#is_agricultural_div').show();}
            });
        });
        $('#estate_type').trigger('change');
        $('#city_id').on('change',function (){
            let city_id = $(this).val();
            $.get( "{{url('api/home/areas')}}", { city_id }, function( response ) {
                if (response.status.status === 'success'){
                    console.log(response.Areas);
                    let html = '';
                    response.Areas.forEach(area=>{
                        html +='<option value="'+area.id+'">'+area.name+'</option>'
                    });
                    $('#area_id').html(html);
                }else{
                    console.log(response.status.message);
                }
            });
        });
        $("#city_id").trigger('change');
    </script>
    <script>
        let markers = [];
        let map,infoWindow;
        let labelIndex = 0;

        function initMap() {
            let myOptions = {
                zoom: 17,
                center: new google.maps.LatLng(12.97, 77.59),
                mapTypeId: google.maps.MapTypeId.HYBRID,
                mapTypeControlOptions: {
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.HYBRID,google.maps.MapTypeId.SATELLITE]
                },
                disableDoubleClickZoom: true,
                // scrollwheel: false,
                // draggableCursor: "crosshair"
            };
            map = new google.maps.Map(document.getElementById("map"), myOptions);
            infoWindow = new google.maps.InfoWindow;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    let pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    infoWindow.open(map);
                    map.setCenter(pos);
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                handleLocationError(false, infoWindow, map.getCenter());
            }
            google.maps.event.addListener(map, 'click', function(event) {
                clearMarkers();
                console.log(event.latLng);
                addMarker(event.latLng, map);
                let locationLin=  event.latLng.toString().replace('(','').replace(')','').split(',');
                $('#lat').val(parseFloat(locationLin[0]));
                $('#lng').val(parseFloat(locationLin[1]));
            });
            clearMarkers(map);
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }
        function clearMarkers() {
            setMapOnAll(null);
            markers = [];
            labelIndex= 1;
        }
        function addMarker(location, map) {
            let marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDX8AHzUs-M8DHe5y9QSSsHfBTeQLfh_yY&callback=initMap" async defer></script>
@endsection
