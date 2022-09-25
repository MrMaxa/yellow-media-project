<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Access\AuthorizationException;

class UserRepository
{
    /**
     * @throws AuthorizationException
     */
    public function login(string $login, string $password): User
    {
        $user = $this->retrieveByCredentials($login, $password);

        return $this->updateUserToken($user);
    }

    public function register(array $userData): User
    {
        $user = new User([
            'first_name' => $userData['first_name'],
            'last_name' => $userData['last_name'],
            'email' => $userData['email'],
            'phone' => $userData['phone'],
            'password' => Hash::make($userData['password']),
        ]);

        $user->save();

        return $user;
    }

    private function updateUserToken(User $user): User
    {
        $user->update(['api_token' => Str::random(60)]);

        return $user;
    }

    /**
     * @throws AuthorizationException
     */
    private function retrieveByCredentials(string $login, string $password): User
    {
        $user = User::where('email', $login)->first();
        $userPassword = $user->password ?? '';

        $validCredentials = Hash::check($password, $userPassword);
        if (is_null($user) || !$validCredentials) {
            throw new AuthorizationException('Login failed wrong user credentials');
        }

        return $user;
    }
}
