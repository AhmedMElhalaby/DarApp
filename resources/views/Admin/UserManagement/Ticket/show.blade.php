@extends('AhmedPanel.crud.main')
@section('style')
    <style>
        .TicketCard{
            padding: 10px 25px;
            border-radius: 20px;
            margin: 20px;
            font-size: 17px;
            min-width: 250px;
            display: inline-block;
        }
        .TicketCardUser{
            background-color: #e2e0e0;
        }
        .TicketCardAdmin{
            background-color: #e3b9b9;
        }
        .TicketCardLRUser{
            @if(app()->getLocale() == 'ar')
                text-align: right;
            @else
                text-align: left;
            @endif
        }
        .TicketCardLRAdmin{
            @if(app()->getLocale() == 'ar')
                text-align: left;
            @else
                text-align: right;
            @endif
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header " data-background-color="{{ config('app.color') }}">
                    <h4 class="title" style="display: inline-block">{{__('admin.show')}} {{__('crud.'.$lang.'.crud_the_name')}}</h4>
                    @if($Object->getStatus() == \App\Helpers\Constant::TICKETS_STATUS['Open'])
                        <a href="{{url('user_managements/tickets/'.$Object->getId().'/close')}}" class="btn btn-white pull-right" style="margin: 0"><i class="fa fa-window-close"></i>   {{__('admin.close')}}</a>
                    @endif

                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-content table-responsive">
                                    <div class="col-md-12">
                                        <div class="TicketCard TicketCardUser">
                                            <strong> {{$Object->getTitle()}}</strong>
                                            <br>
                                            <span>{{$Object->getMessage()}}</span>
                                        </div>
                                    </div>

                                    @foreach($Object->ticket_responses as $response)
                                        <div class="col-md-12  @if($response->sender_type == \App\Helpers\Constant::SENDER_TYPE['User']) TicketCardLRUser @else TicketCardLRAdmin @endif">
                                            <div class=" TicketCard @if($response->sender_type == \App\Helpers\Constant::SENDER_TYPE['User']) TicketCardUser @else TicketCardAdmin @endif">
                                                <span>{{$response->response}}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @if($Object->getStatus() == \App\Helpers\Constant::TICKETS_STATUS['Open'])
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-content table-responsive">
                                    <form action="{{url($redirect.'/'.$Object->getId().'/response')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>{{__('crud.'.$lang.'.response_form')}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label for="ticket_response" class="control-label">{{__('crud.'.$lang.'.ticket_response')}}*</label>
                                                    <textarea id="ticket_response" name="ticket_response" required class="form-control {{ $errors->has('ticket_response') ? ' is-invalid' : '' }}"></textarea>
                                                </div>
                                                @if ($errors->has('ticket_response'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('ticket_response') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row submit-btn">
                                            <button type="submit" class="btn btn-primary" style="margin-left:15px;margin-right:15px;">{{__('admin.Home.n_send')}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
