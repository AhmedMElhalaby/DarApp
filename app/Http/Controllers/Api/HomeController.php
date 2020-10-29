<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Home\FaqRequest;
use App\Http\Requests\Api\Home\InstallRequest;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    use ResponseTrait;

    /**
     * @param InstallRequest $request
     * @return JsonResponse
     */
    public function install(InstallRequest $request){
        return $request->persist();
    }
    /**
     * @param FaqRequest $request
     * @return JsonResponse
     */
    public function faqs(FaqRequest $request)
    {
        return $request->persist();
    }

}
