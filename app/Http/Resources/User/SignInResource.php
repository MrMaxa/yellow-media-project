<?php

declare(strict_types=1);

namespace App\Http\Resources\User;

use App\Http\Resources\BaseResource;
use App\Models\User;

/**
 * @mixin User
 */
class SignInResource extends BaseResource
{
    public function toArray($request): array
    {
        return [
            'api_token' => $this->api_token
        ];
    }
}
