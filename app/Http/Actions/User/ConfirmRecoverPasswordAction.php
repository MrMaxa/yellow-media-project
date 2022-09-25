<?php

declare(strict_types=1);

namespace App\Http\Actions\User;

use App\Http\Resources\BaseResource;
use App\Services\User\AuthService;
use Illuminate\Http\JsonResponse;

class ConfirmRecoverPasswordAction
{
    public function __construct(private readonly AuthService $authService)
    {
    }

    public function handle(array $requestData): JsonResponse
    {
        $token = $requestData['token'] ?? '';
        $password = $requestData['password'] ?? null;
        $result = false;

        if ($token && $password) {
            $this->authService->resetPassword($token, $password);
            $result = true;
        }

        $responseData = ['status' => $result];

        return (new BaseResource($responseData))
            ->response();
    }
}
