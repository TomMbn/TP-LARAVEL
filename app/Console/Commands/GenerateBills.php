<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Contract;
use App\Models\Bill;
use Carbon\Carbon;

class GenerateBills extends Command
{
    protected $signature = 'bills:generate';
    protected $description = 'Generate bills for active contracts';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $contracts = Contract::where('date_end', '>=', Carbon::now())
                             ->where('date_start', '<=', Carbon::now())
                             ->get();

        foreach ($contracts as $contract) {
            $contract->generateBill();
        }

        $this->info('Bills generated successfully!');
    }
}
