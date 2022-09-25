<?php

declare(strict_types=1);

namespace App\Http\Controllers\Company;

use App\Http\Actions\Company\IndexAction;
use App\Http\Actions\Company\StoreAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Company\StoreRequest;
use Illuminate\Http\JsonResponse;

class CompanyController extends BaseController
{
    public function index(IndexAction $action): JsonResponse
    {
        return $action->handle();
    }

    public function store(
        StoreRequest $request,
        StoreAction $action
    ): JsonResponse {
        $companyData = $request->validated();

        return $action->handle($companyData);
    }
}
