<?php

namespace Database\Seeders;

use App\Models\Budget;
use App\Models\FieldCategory;
use Illuminate\Database\Seeder;
use Database\Seeders\YearSeeder;
use Database\Seeders\MonthSeeder;
use Database\Seeders\FieldsSeeder;
use Database\Seeders\StatusSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatusSeeder::class);
        $this->call(FieldCategorySeeder::class);
        \App\Models\User::factory(10)->create();
        $this->call(MonthSeeder::class);
        $this->call(YearSeeder::class);
        $this->call(FieldsSeeder::class);
        \App\Models\Budget::factory(50)->create();
    }
}
