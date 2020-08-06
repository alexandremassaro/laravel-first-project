<?php

namespace App\Console\Commands;

use App\Company;
use Illuminate\Console\Command;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'contact:company {name} {phone=N/A}';
    //protected $signature = 'contact:company {name} {phone?}';
    protected $signature = 'contact:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new company';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $name = $this->ask('Whats is the company name?');
        $phone = $this->ask('Whats is the company\'s phone number?');

        if ($this->confirm('Are you sure you want to insert "' . $name . '"?')){

            $company = Company::create([
                'name' => $name,
                // 'phone' => $this->argument('phone') ?? 'N/A'
                'phone' => $phone
            ]);

            $this->info('Added: ' . $company->name);
            return;
        }

        // $company = Company::create([
        //     'name' => $this->argument('name'),
        //     // 'phone' => $this->argument('phone') ?? 'N/A'
        //     'phone' => $this->argument('phone')
        // ]);

        //$this->info('Added: ' . $company->name);

        $this->warn('No new company was added.');
        //$this->error('This is a error');
    }
}
