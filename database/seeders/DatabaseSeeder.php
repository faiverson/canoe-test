<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Fund;
use App\Models\FundManager;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (app()->environment('local')) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            DB::table('company_fund')->truncate();
            Fund::truncate();
            FundManager::truncate();
            Company::truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }

        $this->call(CompanySeed::class);
        $this->call(FundSeeder::class);
    }
}
