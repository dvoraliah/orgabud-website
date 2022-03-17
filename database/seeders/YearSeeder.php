<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $annees = [
            [
                'year' => 2019
            ],
            [
                'year' => 2020
            ],
            [
                'year' => 2021
            ],
            [
                'year' => 2022
            ],
            [
                'year' => 2023
            ],
        ];

        
        foreach ($annees as $annee) {
            Year::create($annee);
        }

    }
}
