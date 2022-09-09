<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarModel;
use App\Models\Feature;
use App\Models\Make;
use App\Models\Specification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $makes = Make::all();
        $carModels = CarModel::all();
        $features = Feature::all();
        $specifications = Specification::all();
        for ($i = 0; $i < 90; $i++) {
            $carModel = $carModels->random();
            $car = Car::create([
                'name' => $carModel->name,
                'slug' => Str::slug($carModel->name),
                'description' => 'Free Kia Care2 Service plan with July orders. Kia Care plan can be used at any Kia dealer nationwide. Great for those purchasing from a distance as you can have your new Kia maintained at your local dealership! 4.9% FINANCE AND £500 FINANCE DEPOSIT ALLOWANCE INCLUDED ++£279.00 monthly with a £4,444.60 cash deposit on Kia PCP finance. PERSONAL CONTRACT PURCHASE EXAMPLE: Cash Price £27,495.00, Less £500 Kia Finance Deposit Allowance, Less cash Deposit £4,444.60, Amount of Credit £22,540.40, Charge for Credit £2,806.08, Total Amount Payable £30,201.08, Monthly Payment 36x £279.00 over 37 Months, Optional final payment £15,312.48, Based on 6000 miles per annum, 4.9% APR, Excess mileage charge 7.5p per mile Excl VAT for the first 5000 miles and at twice that thereafter',
                'body' => '',
                'image' => 'cars/01.jpg',
                'feature_summary_image' => 'cars/feature_summary.png',
                'images' => '["cars//gallery-01.jpg","cars//gallery-01.jpg","cars//gallery-01.jpg","cars//gallery-01.jpg","cars//gallery-01.jpg","cars//gallery-01.jpg"]',
                'status' => 1,
                'vin' => Str::random(16),
                'year' => mt_rand(1990, 2022),
                'mileage' => mt_rand(0, 150) * 1000,
                'car_model_id' => $carModel->id,
                'make_id' => $carModel->make->id,
                'price' => mt_rand(10, 100) * 1000,
                'exterior_images_360' => '/storage/360/1/',
                'exterior_images_360_quantity' => 24,
                'exterior_images_360_format' => 'webp',
            ]);
            $carFeatures = $features->random(4);
            $car->features()->sync($carFeatures);

            $carSpecs = $specifications->shuffle()->groupBy('specification_type_id');
            foreach ($carSpecs as $value) {
                $carSpec = $value->first();
                $car->specifications()->attach($carSpec);
            }

            // $car->specifications()->sync($specifications);
        }

    }
}
