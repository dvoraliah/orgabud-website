<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fieldsEarning = [
            [
                'name' => 'Salaire',
                'field_category_id' => 1,
                'is_private' => 0
            ],
            [
                'name' => 'Allocations',
                'field_category_id' => 1,
                'is_private' => 0
            ],
            [
                'name' => 'Pension Alimentaire',
                'field_category_id' => 1,
                'is_private' => 0
            ],
            [
                'name' => 'Cadeaux',
                'field_category_id' => 1,
                'is_private' => 0
            ],
            [
                'name' => 'Objets Vendus',
                'field_category_id' => 1,
                'is_private' => 0
            ],
            [
                'name' => 'Revenus Exceptionnels',
                'field_category_id' => 1,
                'is_private' => 0
            ],
            [
                'name' => 'Prime',
                'field_category_id' => 1,
                'is_private' => 0
            ],
        ];

        $fieldsCurrentsDebit = [
            [
                'name' => 'Loyer Habitation',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Charges Habitation',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Garage',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Crédit Auto',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Impôt Foncier',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Taxe d\'Habitation',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Impôt Autre',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Electricité',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Gaz',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Assurance Habitation',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Assurance Auto',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Assurance Autre',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Téléphone',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Mutuelle Santé',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Internet',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'VOD',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Autre Abonnement',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Frais bancaire',
                'field_category_id' => 2,
                'is_private' => 0
            ],
            [
                'name' => 'Divers',
                'field_category_id' => 2,
                'is_private' => 0
            ],
        ];

        $fieldsCurrentsSpend = [
            [
                'name' => 'Nourriture',
                'field_category_id' => 3,
                'is_private' => 0
            ],
            [
                'name' => 'Energie Voiture',
                'field_category_id' => 3,
                'is_private' => 0
            ], 
            [
                'name' => 'Divers',
                'field_category_id' => 3,
                'is_private' => 0
            ],
        ];

        $fieldsSaving = [
            [
                'name' => 'Livret 1',
                'field_category_id' => 4,
                'is_private' => 0
            ],
            [
                'name' => 'Livret 2',
                'field_category_id' => 4,
                'is_private' => 0
            ],
            [
                'name' => 'Livret 3',
                'field_category_id' => 4,
                'is_private' => 0
            ],
            [
                'name' => 'Divers',
                'field_category_id' => 4,
                'is_private' => 0
            ],
            
        ];

        $fieldsOthers = [
            [
                'name' => 'Sorties',
                'field_category_id' => 5,
                'is_private' => 0
            ],
            [
                'name' => 'Achats Divers',
                'field_category_id' => 5,
                'is_private' => 0
            ],
            [
                'name' => 'Transport',
                'field_category_id' => 5,
                'is_private' => 0
            ],
            [
                'name' => 'Péages',
                'field_category_id' => 5,
                'is_private' => 0
            ],
            [
                'name' => 'Autres',
                'field_category_id' => 5,
                'is_private' => 0
            ],

        ];

        foreach ($fieldsCurrentsDebit as $fieldCurrentsDebit) {
            $fieldCurrentsDebit['slug'] = Str::slug($fieldCurrentsDebit['name']);
            Field::create($fieldCurrentsDebit);
        }
        foreach ($fieldsEarning as $fieldEarning) {
            $fieldEarning['slug'] = Str::slug($fieldEarning['name']);
            Field::create($fieldEarning);
        }
        foreach ($fieldsCurrentsSpend as $fieldCurrentsSpend) {
            $fieldCurrentsSpend['slug'] = Str::slug($fieldCurrentsSpend['name']);
            Field::create($fieldCurrentsSpend);
        }
        foreach ($fieldsSaving as $fieldSaving) {
            $fieldSaving['slug'] = Str::slug($fieldSaving['name']);
            Field::create($fieldSaving);
        }
        foreach ($fieldsOthers as $fieldOthers) {
            $fieldOthers['slug'] = Str::slug($fieldOthers['name']);
            Field::create($fieldOthers);
        }
    }
}
