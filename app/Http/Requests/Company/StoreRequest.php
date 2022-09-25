<?php

declare(strict_types=1);

namespace App\Http\Requests\Company;

use App\Http\Requests\BaseApiRequest;

class StoreRequest extends BaseApiRequest
{
    protected function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
            ],
            'phone' => [
                'required',
                'string',
                'max:50',
            ],
            'description' => [
                'required',
                'string',
            ],
        ];
    }
}
