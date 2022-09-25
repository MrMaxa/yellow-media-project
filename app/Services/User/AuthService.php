<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserRepository;
use http\Exception\InvalidArgumentException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthService
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    /**
     * @throws AuthorizationException
     */
    public function login(string $login, string $password): User
    {
        $user = $this->retrieveByCredentials($login, $password);

        $userData = [
            'api_token' => Str::random(60),
        ];

        return $this->userRepository->update($user, $userData);
    }

    /**
     * @throws AuthorizationException
     */
    public function recoverPassword(string $email): string
    {
        $user = $this->userRepository->findByEmail($email);
        if (is_null($user)) {
            throw new AuthorizationException('Not found user with such email!');
        }

        $resetToken = Str::random();
        $updateData = [
            'reset_token' => $resetToken,
            'token_created_at' => Carbon::now(),
        ];

        $this->userRepository->update($user, $updateData);

        return route('user.confirm-recover-password', [
            'token' => $resetToken
        ]);
    }

    public function resetPassword(string $token, string $password): User
    {
        $user = $this->userRepository->findByToken($token);
        if (is_null($user)) {
            throw new InvalidArgumentException('User not found!');
        }

        $this->userRepository->update($user, [
            'password' => Hash::make($password),
            'reset_token' => null,
            'token_created_at' => null,
        ]);

        return $user;
    }

    /**
     * @throws AuthorizationException
     */
    private function retrieveByCredentials(string $login, string $password): User
    {
        $user = $this->userRepository->findByEmail($login);
        $userPassword = $user->password ?? '';

        $validCredentials = Hash::check($password, $userPassword);
        if (is_null($user) || !$validCredentials) {
            throw new AuthorizationException('Login failed wrong user credentials');
        }

        return $user;
    }
}
