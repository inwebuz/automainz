<?php

namespace Database\Seeders;

use App\Models\SpecificationType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SpecificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = ['Body', 'Fuel Type', 'Transmission', 'Engine', 'Cylinders', 'Horsepower', 'Drive Train', 'MPG', 'Exterior Color', 'Interior Color'];
        foreach ($values as $value) {
            SpecificationType::create([
                'name' => $value,
                'slug' => Str::slug($value),
                'status' => 1,
                'used_for_filter' => in_array($value, ['Body', 'Fuel Type']) ? 1 : 0,
                'is_main' => in_array($value, ['Engine', 'Fuel Type', 'Transmission']) ? 1 : 0,
                'image' => 'specification_types/' . Str::slug($value) . '.png',
            ]);
        }
    }
}
