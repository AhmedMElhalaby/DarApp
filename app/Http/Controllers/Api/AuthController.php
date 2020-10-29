<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ForgetPasswordRequest;
use App\Http\Requests\Api\Auth\SendForgetPasswordRequest;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\PasswordRequest;
use App\Http\Requests\Api\Auth\RefreshRequest;
use App\Http\Requests\Api\Auth\RegistrationRequest;
use App\Http\Requests\Api\Auth\ResendVerifyRequest;
use App\Http\Requests\Api\Auth\ResetPasswordRequest;
use App\Http\Requests\Api\Auth\SocialLoginRequest;
use App\Http\Requests\Api\Auth\UserRequest;
use App\Http\Requests\Api\Auth\VerifyRequest;
use App\Http\Resources\Api\User\UserResource;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ResponseTrait;
    /**
     * Create user
     *
     * @param RegistrationRequest $request
     * @return JsonResponse
     */
    public function register(RegistrationRequest $request)
    {
        return $request->persist();
    }
    /**
     * Login user and create token
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        return $request->persist();
    }
    /**
     * Login user and create token
     *
     * @param SocialLoginRequest $request
     * @return JsonResponse
     */
    public function social_login(SocialLoginRequest $request)
    {
        return $request->persist();
    }
    /**
     * Show user profile
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request)
    {
        return $this->successJsonResponse([],new UserResource($request->user(),$request->bearerToken()),'User');
    }
    /**
     * Logout user (Revoke the token)
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->update(['device_token'=>null,'device_type'=>null]);
        $request->user()->token()->revoke();
        $request->user()->token()->delete();
        return $this->successJsonResponse([__('auth.logout')]);
    }
    /**
     * Update user profile
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function update(UserRequest $request)
    {
        return $request->persist();
    }
    /**
     * verify account
     *
     * @param ResendVerifyRequest $request
     * @return JsonResponse
     */
    public function resend_verify(ResendVerifyRequest $request){
        return $request->persist();
    }
    /**
     * verify account
     *
     * @param VerifyRequest $request
     * @return JsonResponse
     */
    public function verify(VerifyRequest $request){
        return $request->persist();
    }
    /**
     * Refresh device token
     *
     * @param RefreshRequest $request
     * @return JsonResponse
     */
    public function refresh(RefreshRequest $request){
         return $request->persist();
    }
    /**
     * @param PasswordRequest $request
     * @return JsonResponse
     */
    public function change_password(PasswordRequest $request){
        return $request->persist();
    }
    /**
     * @param ForgetPasswordRequest $request
     * @return JsonResponse
     */
    public function forget_password(ForgetPasswordRequest $request){
        return $request->persist();
    }
    /**
     * @param SendForgetPasswordRequest $request
     * @return JsonResponse
     */
    public function send_forget_password(SendForgetPasswordRequest $request){
        return $request->persist();
    }
    /**
     * @param ResetPasswordRequest $request
     * @return JsonResponse
     */
    public function reset_password(ResetPasswordRequest $request){
        return $request->persist();
    }
}
