<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->title(),
            'phone' => $this->faker->phoneNumber(),
            'description' => $this->faker->text(30),
        ];
    }
}
