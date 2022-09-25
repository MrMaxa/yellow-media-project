<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use App\Http\Requests\BaseApiRequest;
use Illuminate\Http\Request;

class ConfirmRecoverPasswordRequest extends BaseApiRequest
{
    protected function rules(): array
    {
        return [
            'token' => [
                'required',
                'string',
                'exists:users,reset_token',
            ],
            'password' => [
                'required',
                'string',
                'min:4',
            ],
        ];
    }

    protected function getValidateData(Request $request): array
    {
        $allData = $request->all();
        $additionalData = ['token' => $request->route('token')];

        return array_merge($allData, $additionalData);
    }

    protected function extractInputFromRules(Request $request, array $rules): array
    {
        return $this->getValidateData($request);
    }
}
