<?php

namespace Database\Seeders;

use App\Models\ImageBuilding;
use App\Models\Room;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Building::factory(10)
        ->has(
            Room::factory()
            ->count(10)
        )
        ->has(
            ImageBuilding::factory()->count(4), 'images'
        )
        ->create();
    }
}
