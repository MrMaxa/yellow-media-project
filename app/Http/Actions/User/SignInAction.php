<?php

declare(strict_types=1);

namespace App\Http\Actions\User;

use App\Http\Resources\User\SignInResource;
use App\Services\User\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Auth\Access\AuthorizationException;

class SignInAction
{
    public function __construct(private readonly AuthService $authService)
    {
    }

    /**
     * @throws AuthorizationException
     */
    public function handle(array $userData): JsonResponse
    {
        $userEmail = $userData['email'] ?? '';
        $userPassword = $userData['password'] ?? '';

        $user = $this->authService->login($userEmail, $userPassword);

        return (new SignInResource($user))
            ->response();
    }
}
