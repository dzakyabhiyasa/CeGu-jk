<?php

namespace Database\Factories;

use App\Models\Building;
use App\Models\ImageBuilding;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageBuildingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ImageBuilding::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'building_id' => Building::factory(),
            'image' => $this->faker->image('public/storage/',400,300, null, false)
        ];
    }

}
