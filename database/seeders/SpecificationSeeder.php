<?php

namespace Database\Seeders;

use App\Models\Specification;
use App\Models\SpecificationType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = ['Body' => ['Sedan', 'Hatchback', 'Crossover', 'Sport Car'], 'Fuel Type' => ['Gas', 'Diesel', 'Electric', 'Hybrid'], 'Transmission' => ['Automatic', 'Manual 5 Speed', 'Manual 6 Speed', 'Manual 7 Speed'], 'Engine' => ['1.0L', '1.2L', '1.6L', '2.0L'], 'Cylinders' => ['3', '4', '6'], 'Horsepower' => ['85', '105', '135'], 'Drive Train' => ['2WD', '4WD'], 'MPG' => ['29 city / 39 hwy', '26 city / 36 hwy'], 'Exterior Color' => ['Black', 'White', 'Blue', 'Red', 'Green', 'Gray', 'Yellow'], 'Interior Color' => ['Black', 'Brown', 'Gray', 'White']];
        $specificationTypes = SpecificationType::all();
        foreach ($values as $key => $value) {
            foreach ($value as $value1) {
                Specification::create([
                    'specification_type_id' => $specificationTypes->where('name', $key)->first()->id,
                    'name' => $value1,
                    'slug' => Str::slug($value1),
                    'status' => 1,
                    'source' => 1,
                ]);
            }
        }
    }
}
