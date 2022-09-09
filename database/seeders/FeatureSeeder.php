<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = ['ABS Brakes', 'Air Conditioning', 'Cruise Control', 'Overhead Airbags', 'Panoramic Sunroof', 'Parking Sensors', 'Power Mirrors', 'Side Airbags'];
        foreach ($values as $value) {
            Feature::create([
                'name' => $value,
                'slug' => Str::slug($value),
                'status' => 1,
                'source' => 1,
                'used_for_filter' => in_array($value, ['ABS Brakes', 'Air Conditioning']) ? 1 : 0,
            ]);
        }
    }
}
