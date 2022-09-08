<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Photo::create([
                'name' => $i,
                'image' => 'photos/01.jpg',
                'instagram_username' => '@happylovepeacekeeper',
                'instagram_link' => '',
                'status' => 1,
            ]);
        }
    }
}
