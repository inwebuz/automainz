<?php

namespace Database\Seeders;

use App\Models\CarModel;
use App\Models\Make;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            'Mercedes' => ['E 220', 'E 230', 'E 240'], 'BMW' => ['X6', '316', '520'], 'Audi' => ['A4', 'A6', 'A8'], 'Chevrolet' => ['Lacetti', 'Spark', 'Cobalt'], 'Tesla' => ['Model 3', 'Model Y', 'Model X'], 'Toyota' => ['Prado', 'Camry'], 'Honda' => ['Accord', 'Civic']
        ];
        $makes = Make::all();
        foreach ($values as $key => $value) {
            foreach ($value as $value1) {
                CarModel::create([
                    'make_id' => $makes->where('name', $key)->first()->id,
                    'name' => $value1,
                    'slug' => Str::slug($value1),
                    'status' => 1,
                ]);
            }
        }
    }
}
