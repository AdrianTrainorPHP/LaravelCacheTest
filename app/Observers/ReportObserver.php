<?php

namespace App\Observers;
use App\QueryRepositories\SearchStringQuery;

/**
 * Class ReportObserver
 * @package App\Observers
 */
class ReportObserver
{
    public function created()
    {
        SearchStringQuery::create()->increment();
    }

    public function deleted()
    {
        SearchStringQuery::create()->decrement();
    }
}
