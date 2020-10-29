<html lang="ar">
<head>
    <title>{{__('crud.'.$lang.'.crud_names')}}</title>
    <style>

        hr {
            height: 0;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
        }
        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #FA1732;;
        }

        table{
            width: 100%;
            border-spacing: 0;
            border-collapse: collapse;
        }

        th, td{ font-size: 12px; padding: 8px 5px; font-family: 'DejaVu Sans Condensed', sans-serif;
            @if(app()->getLocale() == 'ar')
                text-align: right;
            @else
                text-align: left;
            @endif
        }

        th { background-color: #222D32; color: #fff; }

        td { color: #222D32;}

        .borderless{ border: none !important;}

        .text-right{ text-align: right}
        .text-left{ text-align: left}
        .text-center{ text-align: center}

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #ddd !important;
        }

        .payment-preview-wrapper {
            background: #84c529;
            padding: 15px;
            text-align: center;
            color: #fff;
            margin-top: 25px;
            font-size: 16px;
        }
        .pull-right {
            float: right !important;
        }

        .pull-left {
            float: left !important;
        }

        .page-break{
            /*border: 2px solid #FA1732;*/
            /*border-radius: 7px;*/
            height: 100%;
            padding: 10px;
        }

        .tbl_header {
            font-weight: bold;
            line-height: 20px;
        }

    </style>
</head>
<body>

<div class="page-break" @if(app()->getLocale() == 'ar') dir="rtl" @endif>

    <table class="table borderless tbl_header">
        <tr>
            <td width="50%" class="text @if(app()->getLocale() == 'ar') text-right @else text-left @endif " align="right">
                <span>{{__('crud.'.$lang.'.crud_names')}}</span><br>
                <span>{{__('admin.exported_by')}} : {{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->name }}</span><br>
                <span>{{__('admin.exported_date')}} : {{ date('d-m-Y') }}</span>
            </td>
            <td width="50%" class="text @if(app()->getLocale() == 'ar') text-left @else text-right @endif" align="left">
                <div class="text @if(app()->getLocale() == 'ar') text-left @else text-right @endif">
                    <img class="logo" src="{{asset('public/logo.png')}}" alt=" Image" style="height:75px">
                </div>

            </td>
        </tr>
    </table>

    <hr>

    <table class="table table-bordered">
        <thead>
        <tr>
            @foreach($Columns as $column)
                @if(isset($column['export']) && $column['export'] ==false)
                    @else
                    <th>{{__('crud.'.$lang.'.'.$column['name'])}}</th>
                @endif
            @endforeach
        </tr>
        </thead>
        <tbody>


        @foreach($Objects as $object)
            <tr>
                @foreach($Columns as $Column)
                    @if(isset($column['export']) && $column['export'] ==false)
                    @else
                        <td>{!! \App\Traits\AhmedPanelTrait::Columns($Column,$object) !!}</td>
                    @endif
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
