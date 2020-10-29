@extends('AhmedPanel.crud.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header " data-background-color="{{ config('app.color') }}">
                    <h4 class="title">{{__('admin.show')}} {{__(('crud.'.$lang.'.crud_the_name'))}}</h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th style="border-top: none !important;">{{__('crud.User.name')}}</th>
                                            <td style="border-top: none !important;">{{$Object->getName()}}</td>
                                        </tr>
                                        <tr>
                                            <th style="border-top: none !important;">{{__('crud.User.mobile')}}</th>
                                            <td style="border-top: none !important;">{{$Object->getMobile()}}</td>
                                        </tr>
                                        <tr>
                                            <th style="border-top: none !important;">{{__('crud.User.email')}}</th>
                                            <td style="border-top: none !important;">{{$Object->getEmail()}}</td>
                                        </tr>

                                        <tr>
                                            <th style="border-top: none !important;">{{__('crud.User.created_at')}}</th>
                                            <td style="border-top: none !important;">{{\Carbon\Carbon::parse($Object->created_at)->format('Y-m-d')}}</td>
                                        </tr>
                                        <tr>
                                            <th style="border-top: none !important;">{{__('crud.User.is_active')}}</th>
                                            <td style="border-top: none !important;">
                                                <span class="label label-{{($Object->isIsActive())?'success':'danger'}}">{{($Object->isIsActive())?__('admin.activation.active'):__('admin.activation.in_active')}}</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pagination-div">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
