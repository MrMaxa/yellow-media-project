<?php

declare(strict_types=1);

namespace App\Http\Actions\Company;

use App\Http\Resources\Company\CompanyResource;
use App\Repositories\Company\CompanyRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class StoreAction
{
    public function __construct(private readonly CompanyRepository $companyRepository)
    {
    }

    public function handle(array $companyData): JsonResponse
    {
        $company = $this->companyRepository->create($companyData);

        return (new CompanyResource($company))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
