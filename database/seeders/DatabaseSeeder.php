<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TranslationsTableSeeder::class,
            DataTypesTableSeeder::class,
            DataRowsTableSeeder::class,
            MenusTableSeeder::class,
            MenuItemsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class,

            SettingsTableSeeder::class,

            UserSeeder::class,
            PageSeeder::class,
            StaticTextSeeder::class,

            BannerSeeder::class,
            PublicationSeeder::class,

            // PaymentMethodSeeder::class,
            // ShippingMethodSeeder::class,

            // ReviewSeeder::class,

            FeatureGroupSeeder::class,
            FeatureSeeder::class,
            SpecificationGroupSeeder::class,
            SpecificationTypeSeeder::class,
            SpecificationSeeder::class,

            MakeSeeder::class,
            CarModelSeeder::class,
            CarModificationSeeder::class,
            CarSeeder::class,

            PhotoSeeder::class,

        ]);
    }
}
