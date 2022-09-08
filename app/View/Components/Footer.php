<?php

namespace App\View\Components;

use App\Helpers\Helper;
use App\Helpers\LinkItem;
use App\Models\Page;
use App\Models\Region;
use App\Models\StaticText;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\Component;
use TCG\Voyager\Facades\Voyager;

class Footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $locale = app()->getLocale();

        // $footerMenuItems = Helper::menuItems('footer');

        $footerMenuNames = ['Shop', 'Sell/Trade', 'Finance', 'About', 'Careers'];
        $footerMenus = [];
        foreach ($footerMenuNames as $value) {
            $footerMenu = menu($value, '_json');
            if ($footerMenu && !$footerMenu->isEmpty()) {
                $footerMenu->load('translations');
                $footerMenus[] = [
                    'name' => $value,
                    'items' => $footerMenu,
                ];
            }
        }

        // $categories = Helper::categories();

        // $currentRegionID = Helper::getCurrentRegionID();
        // $regions = Cache::remember('regions', 86400, function () use ($locale) {
        //     $regions = Region::orderBy('short_name')->withTranslation($locale)->get();
        //     return $regions;
        // });

        // $cartQuantity = app('cart')->getTotalQuantity();
        // $wishlistQuantity = app('wishlist')->getTotalQuantity();
        // $compareQuantity = app('compare')->getTotalQuantity();

        return view('components.footer', compact('footerMenus'));
    }
}
