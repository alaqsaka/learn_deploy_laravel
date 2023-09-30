<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tenants;
use App\Models\Menu;

class TenantMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
         // Number of tenants you want to seed
         $tenantCount = 10;

         // Number of menus per tenant
         $menusPerTenant = 5;

         for ($i = 1; $i <= $tenantCount; $i++) {
             $tenant = Tenants::create([
                'name' => $faker->company(),
                'owner' => $faker->name(),
                'imageUrl' => 'images/Toko C.png',
                'description' => $faker->text('40')
             ]);

             for ($j = 1; $j <= $menusPerTenant; $j++) {
                 Menu::create([
                     'name' => 'Menu ' . $j . ' for Tenant ' . $i,
                     'tenant_id' => $tenant->id,
                     'imageUrl' => 'images/Toko B 1.png',
                     'price' => $faker->numberBetween(1000, 100000),
                     'description' => $faker->text('20')
                 ]);
             }
         }
    }
}
