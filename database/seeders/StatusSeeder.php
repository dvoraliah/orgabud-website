<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'Regular'
            ],
            [
                'name' => 'Premium'
            ],
            [
                'name' => 'Admin'
            ],
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
