<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function findByToken(string $token): ?User
    {
        return User::where('reset_token', $token)->first();
    }

    public function create(array $userData): User
    {
        $password = $userData['password'] ?? '';
        $userData['password'] = Hash::make($password);

        $user = new User($userData);

        $user->save();

        return $user;
    }

    public function update(User $user, array $userData): User
    {
        $user->update($userData);

        return $user;
    }
}
