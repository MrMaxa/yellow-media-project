<?php

declare(strict_types=1);

namespace App\Repositories\Company;

use App\Models\Company;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class CompanyRepository
{
    public function getPaginatedByUser(): LengthAwarePaginator
    {
        /** @var User $currentUser */
        $currentUser = Auth::user();

        return $currentUser->companies()->paginate();
    }

    public function create(array $companyData): Company
    {
        /** @var User $currentUser */
        $currentUser = Auth::user();

        /** @var Company $company */
        $company = $currentUser->companies()->create($companyData);

        return $company;
    }
}
