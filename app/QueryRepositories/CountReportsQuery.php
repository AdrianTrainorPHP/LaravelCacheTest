<?php
namespace App\QueryRepositories;

use App\Models\Company;
use App\Models\Company\Report;
use App\QueryRepositories\Traits\QueryRepository;

/**
 * Class CountReportsQuery
 * @package App\QueryRepositories
 */
class CountReportsQuery
{
    use QueryRepository;

    /**
     * @var string
     */
    protected $modelNamespace = Report::class;

    /**
     * @param Company $company
     * @return \Illuminate\Contracts\Cache\Repository|int
     */
    public function execute(Company $company)
    {
        $this->query->where('company_id', $company->id);
        return $this->count();
    }
}