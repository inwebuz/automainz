<?php

namespace App\Http\Controllers;

use App\Helpers\Breadcrumbs;
use App\Helpers\Helper;
use App\Helpers\LinkItem;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Models\Feature;
use App\Models\Page;
use App\Models\SpecificationType;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $locale = app()->getLocale();
        $params = [
            'specifications' => [],
            'specifications_all' => [],
            'features' => [],
            'price_from' => (float)$request->input('price_from', -1),
            'price_to' => (float)$request->input('price_to', -1),
            'year_from' => (int)$request->input('year_from', -1),
            'year_to' => (int)$request->input('year_to', -1),
            // 'q' => $request->input('q', ''),
        ];
        $selectedFeatures = $request->input('features', []);
        if (is_array($selectedFeatures) && count($selectedFeatures)) {
            $params['features'] = array_keys($selectedFeatures);
        }

        $selectedSpecifications = $request->input('specifications', []);
        if (is_array($selectedSpecifications) && count($selectedSpecifications)) {
            foreach ($selectedSpecifications as $key => $value) {
                $params['specifications'][$key] = array_keys($value);
            }
            $params['specifications_all'] = collect($params['specifications'])->flatten()->toArray();
        }
        $features = Feature::active()->where('used_for_filter', 1)->withTranslation($locale)->get();
        $specificationTypes = SpecificationType::active()->where('used_for_filter', 1)->with(['specifications' => function($q) use ($locale) {
            $q->active()->withTranslation($locale);
        }])->withTranslation($locale)->get();
        $breadcrumbs = new Breadcrumbs();
        $page = Page::where('slug', 'cars')->active()->withTranslation($locale)->firstOrFail();
        $breadcrumbs->addItem(new LinkItem($page->getTranslatedAttribute('name'), $page->url, LinkItem::STATUS_INACTIVE));
        $prices = [
            'min' => floor(Car::active()->min('price')),
            'max' => ceil(Car::active()->max('price')),
        ];
        $years = [
            'min' => floor(Car::active()->min('year')),
            'max' => ceil(Car::active()->max('year')),
        ];

        $query = Car::active();

        // filters
        if ($params['price_from'] != -1) {
            $query->where('cars.price', '>=', $params['price_from']);
        }
        if ($params['price_to'] != -1) {
            $query->where('cars.price', '<=', $params['price_to']);
        }
        if ($params['year_from'] != -1) {
            $query->where('cars.year', '>=', $params['year_from']);
        }
        if ($params['year_to'] != -1) {
            $query->where('cars.year', '<=', $params['year_to']);
        }
        // if (mb_strlen($params['q']) >= 3) {
        //     $q = Helper::escapeFullTextSearch($params['q']);
        //     $query->where('cars.name', 'LIKE', '%' . $q . '%');
        // }

        if (count($params['features'])) {
            $query->whereHas('features', function($q) use ($params) {
                $q->whereIn('features.id', $params['features']);
            });
        }

        if (count($params['specifications'])) {
            $query->where(function ($q) use ($params) {
                foreach ($params['specifications'] as $key => $value) {
                    $q->whereHas('specifications', function($q) use ($value) {
                        $q->whereIn('specifications.id', $value);
                    });
                }
                return $q;
            });
        }

        $cars = $query->with(['carModel' => function($q) use ($locale) {
            $q->withTranslation($locale)->with(['make' => function($q1) use ($locale) {
                $q1->withTranslation($locale)->with([]);
            }]);
        }])->simplePaginate(9)->withQueryString();

        if ($request->input('json', '')) {
            return CarResource::collection($cars);
        }
        if ($request->input('html', '')) {
            return response()->json([
                'html' => view('partials.cars_list', compact('cars'))->render(),
                'nextPageUrl' => $cars->nextPageUrl(),
            ]);
        }

        return view('cars.index', compact('page', 'breadcrumbs', 'cars', 'params', 'features', 'specificationTypes', 'prices', 'years'));
    }

    public function show(Car $car)
    {
        $locale = app()->getLocale();
        $breadcrumbs = new Breadcrumbs();
        $car->load(['translations']);
        $car->load(['specifications' => function($q) use ($locale) {
            $q->withTranslation($locale)->with(['specificationType' => function($q1) use ($locale) {
                $q1->withTranslation($locale);
            }]);
        }]);
        $car->load(['features' => function($q) use ($locale) {
            $q->withTranslation($locale);
        }]);
        // dd($car->features);
        $page = Page::where('slug', 'cars')->active()->withTranslation($locale)->firstOrFail();
        $breadcrumbs->addItem(new LinkItem($page->getTranslatedAttribute('name'), $page->url));
        $breadcrumbs->addItem(new LinkItem($car->getTranslatedAttribute('name'), $car->url, LinkItem::STATUS_INACTIVE));

        $recommendedCars = Car::active()->withTranslation($locale)->where('make_id', $car->make_id)->latest()->take(10)->get();

        return view('cars.show', compact('page', 'breadcrumbs', 'car', 'recommendedCars'));
    }
}
