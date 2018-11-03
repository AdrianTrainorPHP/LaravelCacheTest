<?php
namespace App\QueryRepositories;

use App\Models\Company;
use App\Models\Company\Report;
use App\QueryRepositories\Traits\QueryRepository;

/**
 * Class CountAllQuery
 * @package App\QueryRepositories
 */
class CountAllQuery
{
    use QueryRepository;

    /**
     * @var string
     */
    protected $modelNamespace = Report::class;

    /**
     * @return \Illuminate\Contracts\Cache\Repository|int
     */
    public function execute()
    {
        return $this->count();
    }
}