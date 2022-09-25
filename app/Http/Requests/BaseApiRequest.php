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
}
