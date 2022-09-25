<?php

declare(strict_types=1);

namespace App\Http\Resources\Company;

use App\Http\Resources\BaseResource;
use App\Models\Company;

/**
 * @mixin Company
 */
class CompanyResource extends BaseResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'phone' => $this->phone,
            'description' => $this->description,
        ];
    }
}
