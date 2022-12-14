<?php

namespace Database\Seeders;

use App\Models\Publication;
use App\Pubrubric;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('publications')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 1; $i <= 3; $i++) {
            Publication::factory()->create([
                'name' => 'Get Pre-Qualified',
                'slug' => Str::slug('Get Pre-Qualified'),
                'description' => 'See your actual monthly payment',
                'image' => 'publications/0' . $i . '.jpg',
            ]);
        }

        // Publication::factory()->count(10)->create([
        //     'user_id' => 3,
        // ]);
        // Publication::factory()->count(50)->create();

        // Publication::factory()->count(10)->create([
        //     'type' => Publication::TYPE_PROMOTION,
        // ]);

        // Publication::factory()->count(20)->create([
        //     'type' => Publication::TYPE_ARTICLE,
        // ]);

        // $names = [
        //     'Согреваемся, пока не включили отопление',
        //     'Согреваемся, пока не включили отопление',
        //     'Согреваемся, пока не включили отопление',
        // ];
        // foreach ($names as $key => $name) {
        //     Publication::factory()->create([
        //         'name' => $name,
        //         'slug' => Str::slug($name),
        //         'type' => Publication::TYPE_NEWS,
        //         'created_at' => now()->addSeconds($key + 1),
        //     ]);
        // }
    }
}
