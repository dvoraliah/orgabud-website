<?php

namespace Database\Seeders;

use App\Models\Month;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $months = [
            [
                'name' => 'Janvier'
            ],
            [
                'name' => 'Février'
            ],
            [
                'name' => 'Mars'
            ],
            [
                'name' => 'Avril'
            ],
            [
                'name' => 'Mai'
            ],
            [
                'name' => 'Juin'
            ],
            [
                'name' => 'Juillet'
            ],
            [
                'name' => 'Août'
            ],
            [
                'name' => 'Septembre'
            ],
            [
                'name' => 'Octobre'
            ],
            [
                'name' => 'Novembre'
            ],
            [
                'name' => 'Décembre'
            ],
        ];

        foreach ($months as $month) {
            Month::create($month);
        }
    }
}
