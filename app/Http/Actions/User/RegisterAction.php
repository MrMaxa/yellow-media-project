<?php

declare(strict_types=1);

namespace App\Http\Actions\User;

use App\Http\Resources\User\RegisterResource;
use App\Repositories\User\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class RegisterAction
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function handle(array $userData): JsonResponse
    {
        $user = $this->userRepository->create($userData);

        return (new RegisterResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
