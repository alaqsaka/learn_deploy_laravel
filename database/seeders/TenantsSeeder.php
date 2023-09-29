<?php

namespace Database\Seeders;

use App\Models\Tenants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i=0; $i<20; $i++) {
            Tenants::create([
                'id' => $faker->uuid(),
                'name' => $faker->company(),
                'owner' => $faker->name(),
                'imageUrl' => $faker->imageUrl()
            ]);
        }
    }
}
