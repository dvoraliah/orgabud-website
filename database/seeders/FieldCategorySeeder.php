<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\FieldCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FieldCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Revenus'
            ],
            [
                'name' => 'Prélèvements Courants'
            ],
            [
                'name' => 'Dépenses Courantes'
            ],
            [
                'name' => 'Epargnes'
            ],
            [
                'name' => 'Divers'
            ],
            [
                'name' => 'Résumé'
            ],
        ];

        foreach ($categories as $category) {
            $category['slug'] = Str::slug($category['name']);
            FieldCategory::create($category);
        }
    }
}
