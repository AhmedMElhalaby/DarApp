<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constant;
use App\Helpers\Functions;
use App\Http\Requests\Admin\Home\DeleteMediaRequest;
use App\Http\Requests\Admin\Home\EstateTypeRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class HomeController extends Controller
{

    /**
     * @return Factory|View
     */
    public function index(){
        return view('AhmedPanel.home');
    }
    public function estate_type_response(EstateTypeRequest $request): \Illuminate\Http\JsonResponse
    {
        return $request->persist();
    }
    public function lang(){
        if(session('my_locale','en') =='en'){
            session(['my_locale' => 'ar']);
        }else{
            session(['my_locale' => 'en']);
        }
        App::setLocale(session('my_locale'));
        return redirect()->back();
    }
    public function general_notification(Request $request){
        $Title = $request->has('title')?$request->title:'';
        $Message = $request->has('msg')?$request->msg:'';
        $Users = new User();
        if($request->has('type') && $request->type == 1)
            $Users = $Users->where('type',1);
        if($request->has('type') && $request->type == 2)
            $Users = $Users->where('type',2);
        $Users = $Users->whereNotNull('device_token')->get();
        Functions::sendNotifications($Users,$Title,$Message,null,Constant::NOTIFICATION_TYPE['General']);
        return redirect()->back()->with('status', __('admin.messages.notification_sent'));
    }
}
