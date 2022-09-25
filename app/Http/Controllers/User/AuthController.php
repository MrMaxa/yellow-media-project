<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Actions\User\RegisterAction;
use App\Http\Actions\User\SignInAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\SignInRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;

class AuthController extends BaseController
{
    /**
     * @throws ValidationException
     */
    public function register(
        RegisterRequest $request,
        RegisterAction  $action
    ): JsonResponse {
        $requestData = $request->validated();

        return $action->handle($requestData);
    }

    /**
     * @throws ValidationException
     * @throws AuthorizationException
     */
    public function signIn(
        SignInRequest $request,
        SignInAction  $action
    ): JsonResponse {
        $requestData = $request->validated();

        return $action->handle($requestData);
    }
}
