<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Helpers\Breadcrumbs;
use App\Helpers\Helper;
use App\Helpers\LinkItem;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Models\Page;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $locale = app()->getLocale();
        $breadcrumbs = new Breadcrumbs();
        $breadcrumbs->addItem(new LinkItem(__('main.nav.search'), route('search'), LinkItem::STATUS_INACTIVE));

        $q = Helper::escapeFullTextSearch($request->input('q', ''));

        $isJson = $request->input('json', '');

        $searches = collect([]);

        if ($q && Str::length($q) >= 3) {

            $query = Search::selectRaw("*, MATCH(body) AGAINST('" . $q . "')")
                ->whereRaw("MATCH(body) AGAINST('" . $q . "' IN BOOLEAN MODE)")
                ->whereHasMorph(
                    'searchable',
                    [Car::class],
                    function ($q1) {
                        $q1->active();
                    }
                )
                ->with(['searchable' => function($q1) use ($locale) {
                    $q1->withTranslation($locale);
                }]);
            $count = $query->count();
            if ($count == 0) {
                $query = Search::where('body', 'like', '%' . $q . '%')
                    ->whereHasMorph(
                        'searchable',
                        [Car::class],
                        function ($q1) {
                            $q1->active();
                        }
                    )
                    ->with(['searchable' => function($q1) use ($locale) {
                        $q1->withTranslation($locale);
                    }]);
            }


            if ($isJson) {
                // cars
                $cars = collect();
                $queryClone = clone $query;
                $queryClone->where('searchable_type', Car::class);
                $carIDs  = $queryClone->take(10)->get()->pluck('searchable_id')->toArray();
                if ($carIDs) {
                    $cars = Car::active()->withTranslation($locale)->whereIn('id', $carIDs)->orderByRaw("FIELD(id," . implode(',', $carIDs) . ")")->get();
                }
            } else {
                // only cars
                $query->where('searchable_type', Car::class);

                // get searches
                $searches = $query->paginate(30);
            }
        }

        if ($isJson) {
            return [
                'q' => $q,
                'cars' => CarResource::collection($cars ?? collect()),
            ];
        }

        $links = !$searches->isEmpty() ? $searches->appends(['q' => $q])->links('partials.pagination') : '';

        return view('search', compact('breadcrumbs', 'searches', 'links', 'q'));
    }
}
