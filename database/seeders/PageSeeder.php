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
            'slug' => 'cars',
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

        $page = Page::factory()->create([
            'name' => 'Privacy policy',
            'slug' => Str::slug('Privacy policy'),
            'order' => 40,
            'show_in' => 0,
        ]);
        $page = Page::factory()->create([
            'name' => 'Terms of use',
            'slug' => Str::slug('Terms of use'),
            'order' => 50,
            'show_in' => 0,
        ]);

        $page = Page::factory()->create([
            'name' => 'Find a Store',
            'slug' => Str::slug('Find a Store'),
            'order' => 60,
            'show_in' => 0,
        ]);
        $page = Page::factory()->create([
            'name' => 'Get an Online Offer',
            'slug' => Str::slug('Get an Online Offer'),
            'order' => 60,
            'show_in' => 0,
        ]);
        $page = Page::factory()->create([
            'name' => 'How it Works',
            'slug' => Str::slug('How it Works'),
            'order' => 60,
            'show_in' => 0,
        ]);
        $page = Page::factory()->create([
            'name' => 'Automainz Auto Finance',
            'slug' => Str::slug('Automainz Auto Finance'),
            'order' => 60,
            'show_in' => 0,
        ]);
        $page = Page::factory()->create([
            'name' => 'Search Jobs',
            'slug' => Str::slug('Search Jobs'),
            'order' => 60,
            'show_in' => 0,
        ]);
    }
}
