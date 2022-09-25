<?php

declare(strict_types=1);

namespace App\Http\Actions\User;

use App\Http\Resources\BaseResource;
use App\Services\User\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Auth\Access\AuthorizationException;

class RecoverPasswordAction
{
    public function __construct(private readonly AuthService $authService)
    {
    }

    /**
     * @throws AuthorizationException
     */
    public function handle(array $requestData): JsonResponse
    {
        $email = $requestData['email'] ?? null;
        $confirmUrl = $this->authService->recoverPassword($email);

        $responseData = ['confirm_url' => $confirmUrl];

        return (new BaseResource($responseData))
            ->response();
    }
}
