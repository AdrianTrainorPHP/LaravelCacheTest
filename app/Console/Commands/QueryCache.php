<?php

namespace App\Console\Commands;

use App\Models\Company;
use App\QueryRepositories\CountAllQuery;
use App\QueryRepositories\CountReportsQuery;
use App\QueryRepositories\SearchStringQuery;
use Illuminate\Console\Command;

class QueryCache extends Command
{
    protected $query;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:querycache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Query Cache';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->confirm('Would you like to run "CountAllQuery"?', true))
            $this->countAllQuery();

        if ($this->confirm('Would you like to run "SearchStringQuery"?', true))
            $this->searchStringQuery();

        if ($this->confirm('Would you like to run "CountReportsQuery"?', true))
            $this->foreachCompanyCountReportsQuery();
    }

    /**
     * @return void
     */
    private function countAllQuery()
    {
        $start = microtime(true);
        $cacheKey = 'cachetest.count';
        $cache = CountAllQuery::create()->key($cacheKey);
        $cache->forget();
        $count = $cache->execute();
        $outputs = [
            ['', ''],
            ['<fg=white;bg=red>Test 1 (Before Cache)</>', 'Count All Records'],
            ['Result', $count . ' records found'],
            ['Cache Key', $cacheKey],
            ['Total time', '<fg=white;bg=red> ' . round((microtime(true) - $start), 5) . ' seconds </>'],
            ['', ''],
        ];

        $start = microtime(true);
        $cache = CountAllQuery::create()->key($cacheKey);
        $count = $cache->execute();
        $outputs = array_merge($outputs, [
            ['', ''],
            ['<fg=white;bg=blue>Test 1 (After Cache)</>', 'Count All Records'],
            ['Result', $count . ' records found'],
            ['Cache Key', $cacheKey],
            ['Total time', '<fg=white;bg=blue> ' . round((microtime(true) - $start), 5) . ' seconds </>'],
            ['', ''],
        ]);

        $this->output->table(['', ''], $outputs);
    }

    private function searchStringQuery()
    {
        $start = microtime(true);
        $search = 'quasi facere';
        $cacheKey = 'cachetest.' . strtolower(base64_encode($search));
        $cache = SearchStringQuery::create()->key($cacheKey);
        $cache->forget();
        $count = $cache->execute($search);
        $outputs = [
            ['', ''],
            ['<fg=white;bg=red>Test 2 (Before Cache)</>', 'Search Partial String'],
            ['Result', $count . ' records found'],
            ['Cache Key', $cacheKey],
            ['Total time', '<fg=white;bg=red> ' . round((microtime(true) - $start), 5) . ' seconds </>'],
            ['', ''],
        ];

        $start = microtime(true);
        $cache = SearchStringQuery::create()->key($cacheKey);
        $count = $cache->execute($search);
        $outputs = array_merge($outputs, [
            ['', ''],
            ['<fg=white;bg=blue>Test 2 (After Cache)</>', 'Search Partial String'],
            ['Result', $count . ' records found'],
            ['Cache Key', $cacheKey],
            ['Total time', '<fg=white;bg=blue> ' . round((microtime(true) - $start), 5) . ' seconds </>'],
            ['', ''],
        ]);

        $this->output->table(['', ''], $outputs);
    }

    private function foreachCompanyCountReportsQuery()
    {
        $min = $this->ask('Minimum reports per company (filter)?', 0);
        $max = $this->ask('Maximum reports per company (filter)?', 10000000);
        $headers = ['Company ID', 'Result', '<fg=white;bg=red> Before Cache </>', '<fg=white;bg=blue> After Cache </>'];
        $outputs = [];

        foreach (Company::all() as $company) {

            $cacheKey = 'cachetest.' . $company->id . '.count';

            $start = microtime(true);
            $cache = CountReportsQuery::create()->key($cacheKey);
            $cache->forget();
            $count = $cache->execute($company);
            if ($count < $min || $count > $max) continue;
            $beforeSeconds = round((microtime(true) - $start), 5);

            $start = microtime(true);
            $cache = CountReportsQuery::create()->key($cacheKey);
            $count = $cache->execute($company);
            $afterSeconds = round((microtime(true) - $start), 5);

            $before = $this->buildSecondsOutput(
                $beforeSeconds,
                ($beforeSeconds > $afterSeconds ? 'red' : ($afterSeconds > $beforeSeconds ? 'blue' : 'black'))
            );

            $after = $this->buildSecondsOutput(
                $afterSeconds,
                ($beforeSeconds < $afterSeconds ? 'red' : ($afterSeconds < $beforeSeconds ? 'blue' : 'black'))
            );

            $outputs[] = [
                $company->id,
                $count,
                $before,
                $after,
            ];

        }

        $this->output->table($headers, $outputs);
    }

    private function buildSecondsOutput($seconds, $colour)
    {
        $after = '<fg=white;bg=' . $colour . '>';
        while (strlen($seconds . '') < 7) {
            $seconds .= '0';
        }
        return $after . ' ' . $seconds . ' </>';
    }
}
