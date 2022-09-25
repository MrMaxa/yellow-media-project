<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\ProvidesConvenienceMethods;

class BaseApiRequest
{
    use ProvidesConvenienceMethods;

    public function __construct(protected readonly Request $request)
    {
    }

    protected function rules(): array
    {
        return [];
    }

    /**
     * @throws ValidationException
     */
    public function validated(): array
    {
        return $this->validate($this->request, $this->rules());
    }

    protected function getValidateData(Request $request): array
    {
        return $request->all();
    }

    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = []): array
    {
        $validator = $this->getValidationFactory()
            ->make($this->getValidateData($request), $rules, $messages, $customAttributes);

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }

        return $this->extractInputFromRules($request, $rules);
    }
}
