<?php

namespace App\View\Components;

use App\Models\Category;
use App\Helpers\Helper;
use App\Models\Page;
use App\Models\Region;
use App\Models\StaticText;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use TCG\Voyager\Facades\Voyager;

class Header extends Component
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

        // $banner = Helper::banner('top_1');
        // $menuItems = Helper::menuItems();
        $headerMenuItems = Helper::menuItems('header');
        $pageContact = Page::findOrFail(2);
        $pageContact->load('translations');

        $headerClass = 'header--white';
        if (in_array(Route::currentRouteName(), ['home', 'sell-trade'])) {
            $headerClass = '';
        }

        $switcher = Helper::languageSwitcher();
        $activeLanguageRegional = Helper::getActiveLanguageRegional();

        // $cartQuantity = app('cart')->getTotalQuantity();
        // $wishlistQuantity = app('wishlist')->getTotalQuantity();
        // $compareQuantity = app('compare')->getTotalQuantity();

        // $menuCategoryBanners = collect();
        // $categories = Helper::categories('parents');
        // foreach ($categories as $category) {
        //     $categoryBanner = $category->banners()->menuCategory()->latest()->withTranslation($locale)->active()->first();
        //     if ($categoryBanner) {
        //         $menuCategoryBanners->put($category->id, $categoryBanner);
        //     }
        // }

        // $issetRegionID = Cookie::get('region_id');
        // $currentRegion = Helper::getCurrentRegion();

        $q = request('q', '');

        $badEye = json_decode(request()->cookie('bad_eye'), true);
        if (!$badEye) {
            $badEye = [
                'font_size' => 'normal',
                'contrast' => 'normal',
                'images' => 'normal',
            ];
        }

        return view('components.header', compact('headerMenuItems', 'headerClass', 'pageContact', 'switcher', 'activeLanguageRegional', 'q', 'badEye'));
    }
}
