<?php

declare(strict_types=1);

namespace App\Http\Resources\User;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 */
class SignInResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'api_token' => $this->api_token
        ];
    }
}
