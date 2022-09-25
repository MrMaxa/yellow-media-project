<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use App\Http\Requests\BaseApiRequest;

class RegisterRequest extends BaseApiRequest
{
    protected function rules(): array
    {
        return [
            'first_name' => [
                'required',
                'string',
            ],
            'last_name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email',
            ],
            'phone' => [
                'required',
                'string',
                'max:50',
            ],
            'password' => [
                'required',
                'string',
                'min:4',
            ],
        ];
    }
}
