<?php

namespace App\Console\Commands;

use App\Models\Company;
use Illuminate\Console\Command;

/**
 * Class SeedCompanyReports
 * @package App\Console\Commands
 */
class SeedCompanyReports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:companyreports {totalCompanies?} {totalReportsPerCompany?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Company and Company/Report models';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $totalCompanies = $this->argument('totalCompanies') ?: $this->ask('How many company records do you want to create?', 1);
        $totalCompanyReports = $this->argument('totalReportsPerCompany') ?: $this->ask('How many report records do you want to create per company record?', 1);

        $total = $totalCompanies * $totalCompanyReports;
        $bar = $this->output->createProgressBar($total);

        for ($i = 0; $i < $totalCompanies; $i++) {

            $company = factory(Company::class)->create();

            for ($v = 0; $v < $totalCompanyReports; $v++) {
                $report = factory(Company\Report::class)->make();
                $company->reports()->save($report);
                $bar->advance();
            }

        }

        $bar->finish();
        $this->info('');
        $this->info('Companies and Reports');
        $this->info($totalCompanies . ' Companies and ' . $totalCompanyReports . ' Report records created');
    }
}
