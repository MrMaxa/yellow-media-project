<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');

            $table->string('last_name');

            $table->string('email')
                ->nullable(false)
                ->unique();

            $table->string('phone', 50);

            $table->string('password');

            $table->string('api_token', 80)
                ->unique()
                ->nullable()
                ->default(null);

            $table->string('reset_token')
                ->nullable()
                ->default(null);

            $table->timestamp('token_created_at')
                ->nullable()
                ->default(null);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
