<?php
namespace App\QueryRepositories;

use App\Models\Company\Report;
use App\QueryRepositories\Traits\QueryRepository;

/**
 * Class SearchStringQuery
 * @package App\QueryRepositories
 */
class SearchStringQuery
{
    use QueryRepository;

    /**
     * @var string
     */
    protected $modelNamespace = Report::class;

    /**
     * @param string $search
     * @return \Illuminate\Contracts\Cache\Repository|int
     */
    public function execute($search = '')
    {
        $this->query->where('string_1', 'like', '% ' . $search . '%');
        return $this->count();
    }
}