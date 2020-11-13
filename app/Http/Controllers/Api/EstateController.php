<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Estate\DestroySavedSearchRequest;
use App\Http\Requests\Api\Estate\FavouriteRequest;
use App\Http\Requests\Api\Estate\FavouriteToggleRequest;
use App\Http\Requests\Api\Estate\IndexRequest;
use App\Http\Requests\Api\Estate\SavedSearchRequest;
use App\Http\Requests\Api\Estate\StoreRequest;
use App\Http\Requests\Api\Estate\UpdateRequest;
use App\Http\Requests\Api\Estate\ShowRequest;
use App\Http\Requests\Api\Estate\DeleteMediaRequest;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class EstateController extends Controller
{
    use ResponseTrait;

    /**
     * @param IndexRequest $request
     * @return JsonResponse
     */
    public function index(IndexRequest $request){
        return $request->persist();
    }
    /**
     * @param ShowRequest $request
     * @return JsonResponse
     */
    public function show(ShowRequest $request){
        return $request->persist();
    }
    /**
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request){
        return $request->persist();
    }
    /**
     * @param UpdateRequest $request
     * @return JsonResponse
     */
    public function update(UpdateRequest $request){
        return $request->persist();
    }
    /**
     * @param SavedSearchRequest $request
     * @return JsonResponse
     */
    public function saved_searches(SavedSearchRequest $request){
        return $request->persist();
    }
    /**
     * @param DestroySavedSearchRequest $request
     * @return JsonResponse
     */
    public function destroy_saved_searches(DestroySavedSearchRequest $request){
        return $request->persist();
    }
    /**
     * @param FavouriteRequest $request
     * @return JsonResponse
     */
    public function favourites(FavouriteRequest $request){
        return $request->persist();
    }
    /**
     * @param FavouriteToggleRequest $request
     * @return JsonResponse
     */
    public function favourite_toggle(FavouriteToggleRequest $request){
        return $request->persist();
    }
    /**
     * @param DeleteMediaRequest $request
     * @return JsonResponse
     */
    public function delete_media(DeleteMediaRequest $request){
        return $request->persist();
    }



}
