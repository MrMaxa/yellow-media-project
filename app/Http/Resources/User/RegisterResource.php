<?php

declare(strict_types=1);

namespace App\Http\Resources\User;

use App\Http\Resources\BaseResource;
use App\Models\User;

/**
 * @mixin User
 */
class RegisterResource extends BaseResource
{
    public function toArray($request): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}
