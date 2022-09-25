<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use App\Http\Requests\BaseApiRequest;

class SignInRequest extends BaseApiRequest
{
    protected function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                'exists:users,email',
            ],
            'password' => [
                'required',
                'string',
                'min:4',
            ],
        ];
    }
}
