<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    private const COMPANY_USER_EMAIL = 'company-user@gmail.com';
    private const EMPTY_USER_EMAIL = 'empty-user@gmail.com';

    public function run()
    {
        $this->createUserWithCompanies();
        $this->createEmptyUser();
    }

    private function createUserWithCompanies()
    {
        if (User::query()->where('email', self::COMPANY_USER_EMAIL)->exists()) {
            return;
        }

        $user = User::factory()->create(['email' => self::COMPANY_USER_EMAIL]);
        Company::factory()->count(2)->create([
            'user_id' => $user->id
        ]);
    }

    private function createEmptyUser()
    {
        if (User::query()->where('email', self::EMPTY_USER_EMAIL)->exists()) {
            return;
        }

        User::factory()->create(['email' => self::EMPTY_USER_EMAIL]);
    }
}
