<?php

namespace Database\Seeders;

use App\Models\Budget;
use App\Models\FieldCategory;
use Illuminate\Database\Seeder;
use Database\Seeders\YearSeeder;
use Database\Seeders\MonthSeeder;
use Database\Seeders\FieldsSeeder;
use Database\Seeders\StatusSeeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        $this->call(UserSeeder::class);
        \App\Models\User::factory(10)->create();
        $this->call(FieldsSeeder::class);
        \App\Models\Budget::factory(50)->create();
        Role::create(['name' => 'Regular']);
        Role::create(['name' => 'Premium']);
        Role::create(['name' => 'Admin']);
        Permission::create(['name' => 'See All Users']);
        Permission::create(['name' => 'See a Specific User']);
        Permission::create(['name' => 'See his profil']);
        $admin = Role::findById(3);
        $premium = Role::findById(2);
        $regular = Role::findById(1);
        $seeAll = Permission::findByName('See All Users');
        $specific = Permission::findByName('See a Specific User');
        $only = Permission::findByName('See his profil');
        $admin->givePermissionTo([$seeAll, $specific]);
        $premium->givePermissionTo([$specific, $only]);
        $regular->givePermissionTo([$only]);
    }
}
