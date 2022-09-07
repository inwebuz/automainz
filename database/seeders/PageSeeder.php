<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = Page::factory()->create([
            'name' => 'Home',
            'slug' => 'home',
            'order' => 0,
            'show_in' => 0,
        ]);

        $page = Page::factory()->create([
            'name' => 'Contacts',
            'slug' => 'contacts',
            'order' => 1000,
            'show_in' => 0,
            'description' => '',
            'body' => '',
        ]);

        $page = Page::factory()->create([
            'name' => 'About Automainz',
            'slug' => Str::slug('About Automainz'),
            'order' => 40,
            'show_in' => 0,
        ]);

        $page = Page::factory()->create([
            'name' => 'Shop',
            'slug' => 'shop',
            'order' => 10,
            'show_in' => 2,
        ]);

        $page = Page::factory()->create([
            'name' => 'Sell/Trade',
            'slug' => 'sell-trade',
            'order' => 20,
            'show_in' => 2,
        ]);

        $page = Page::factory()->create([
            'name' => 'Finance',
            'slug' => 'finance',
            'order' => 30,
            'show_in' => 2,
        ]);


    }
}
