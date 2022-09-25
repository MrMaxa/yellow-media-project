<?php

declare(strict_types=1);

namespace App\Http\Actions\Company;

use App\Http\Resources\Company\CompanyResource;
use App\Repositories\Company\CompanyRepository;
use Illuminate\Http\JsonResponse;

class IndexAction
{
    public function __construct(private readonly CompanyRepository $companyRepository)
    {
    }

    public function handle(): JsonResponse
    {
        $companies = $this->companyRepository->getPaginatedByUser();

        return CompanyResource::collection($companies)
            ->response();
    }
}
