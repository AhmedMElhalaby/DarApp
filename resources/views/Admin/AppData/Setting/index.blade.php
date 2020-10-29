@extends('AhmedPanel.crud.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="{{ config('app.color') }}">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="title">{{__('crud.'.$lang.'.crud_names')}}</h4>
                    </div>
                </div>
            </div>
            <div class="card-content table-responsive">
                <form action="{{url($redirect)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label for="facebook" class="control-label">{{__('crud.'.$lang.'.Fields.facebook')}}</label>
                                <input type="url" id="facebook" name="facebook" class="form-control {{ $errors->has('facebook') ? ' is-invalid' : '' }}" value="{{\App\Models\Setting::where('key','facebook')->first()->value}}">
                            </div>
                            @if ($errors->has('facebook'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('facebook') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label for="instagram" class="control-label">{{__('crud.'.$lang.'.Fields.instagram')}}</label>
                                <input type="url" id="instagram" name="instagram" class="form-control {{ $errors->has('instagram') ? ' is-invalid' : '' }}" value="{{\App\Models\Setting::where('key','instagram')->first()->value}}">
                            </div>
                            @if ($errors->has('instagram'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('instagram') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label for="email" class="control-label">{{__('crud.'.$lang.'.Fields.email')}}</label>
                                <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{\App\Models\Setting::where('key','email')->first()->value}}">
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label for="mobile" class="control-label">{{__('crud.'.$lang.'.Fields.mobile')}}</label>
                                <input type="tel" id="mobile" name="mobile" class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}" value="{{\App\Models\Setting::where('key','mobile')->first()->value}}">
                            </div>
                            @if ($errors->has('mobile'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label for="address" class="control-label">{{__('crud.'.$lang.'.Fields.address')}}</label>
                                <input type="text" id="address" name="address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{\App\Models\Setting::where('key','address')->first()->value}}">
                            </div>
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label for="lat" class="control-label">{{__('crud.'.$lang.'.Fields.lat')}}</label>
                                <input type="text" id="lat" name="lat" class="form-control {{ $errors->has('lat') ? ' is-invalid' : '' }}" value="{{\App\Models\Setting::where('key','location')->first()->value}}">
                            </div>
                            @if ($errors->has('lat'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lat') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label for="lng" class="control-label">{{__('crud.'.$lang.'.Fields.lng')}}</label>
                                <input type="text" id="lng" name="lng" class="form-control {{ $errors->has('lng') ? ' is-invalid' : '' }}" value="{{\App\Models\Setting::where('key','location')->first()->value_ar}}">
                            </div>
                            @if ($errors->has('lng'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lng') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row submit-btn">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" style="margin-left:15px;margin-right:15px;">{{__('admin.save')}}</button>
                        </div>
                    </div>
                </form>

                {{--                Pages Card                   --}}
                <div class="card">
                    <div class="card-header" data-background-color="{{ config('app.color') }}">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="title">{{__('crud.'.$lang.'.Category.page')}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                            @foreach($Columns as $column)
                                <th @if( $column['order']) onclick="orderBy('{{$column['name']}}')" class="pointer" @endif>
                                    {{__('crud.'.$lang.'.'.$column['name'])}}
                                    @if( $column['order'])
                                        @if(request()->has('order_type') && request()->order_by ==$column['name'])
                                            @if(request('order_type') == 'desc')
                                                <span class="px-3"><i class="fa fa-caret-down"></i></span>
                                            @else
                                                <span class="px-3"><i class="fa fa-caret-up"></i></span>
                                            @endif
                                        @else
                                            <span class="px-3"><i class="fa fa-sort"></i></span>
                                        @endif
                                    @endif
                                </th>
                            @endforeach
                            <th><a href="#" onclick="AdvanceSearch()">{{__('admin.advance_search')}} <i id="advance_search_caret" class="fa fa-caret-down"></i></a></th>
                            </thead>
                            <tbody>
                            <tr id="advance_search">
                                <form action="{{url($redirect)}}" id="search">
                                    <input type="hidden" name="order_by" id="order_by" value="{{app('request')->input('order_by')}}">
                                    <input type="hidden" name="order_type" id="order_type" value="{{app('request')->input('order_type')}}">
                                    @foreach($Columns as $Column)
                                        <td>{!! \App\Traits\AhmedPanelTrait::SearchColumns($Column,$lang) !!}</td>
                                    @endforeach
                                    <td>
                                        <input type="submit" class="btn btn-sm btn-primary" style="margin: 0;" value="{{__('admin.search')}}">
                                    </td>
                                </form>
                            </tr>
                            @foreach($Objects as $object)
                                <tr>
                                    @foreach($Columns as $Column)
                                        <td>{!! \App\Traits\AhmedPanelTrait::Columns($Column,$object) !!}</td>
                                    @endforeach
                                    <td class="text-primary">
                                        @foreach($Links as $Link)
                                            {!! \App\Traits\AhmedPanelTrait::Links($Link,$object,$redirect) !!}
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination-div">
        {{ $Objects->appends(\App\Traits\AhmedPanelTrait::SearchAppends($Columns))->links() }}
    </div>
</div>
@endsection

