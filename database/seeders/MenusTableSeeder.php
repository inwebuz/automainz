<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        Menu::firstOrCreate([
            'name' => 'admin',
        ]);
        Menu::firstOrCreate([
            'name' => 'Shop',
        ]);
        Menu::firstOrCreate([
            'name' => 'Sell/Trade',
        ]);
        Menu::firstOrCreate([
            'name' => 'Finance',
        ]);
        Menu::firstOrCreate([
            'name' => 'About',
        ]);
        Menu::firstOrCreate([
            'name' => 'Careers',
        ]);
    }
}
