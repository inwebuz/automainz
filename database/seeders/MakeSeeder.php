<?php

namespace Database\Seeders;

use App\Models\Make;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = ['Mercedes', 'BMW', 'Audi', 'Chevrolet', 'Tesla', 'Toyota', 'Honda'];
        foreach ($values as $value) {
            Make::create([
                'name' => $value,
                'slug' => Str::slug($value),
                'status' => 1,
            ]);
        }
    }
}
