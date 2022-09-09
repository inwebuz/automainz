<?php

namespace App\Http\Controllers;

use App\Helpers\Breadcrumbs;
use App\Helpers\LinkItem;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Page;
use App\Models\Review;

class PageController extends Controller
{
    /**
     * show single page
     */
    public function show(Request $request, $slug)
    {
        $locale = app()->getLocale();
        $defaultLocale = config('voyager.multilingual.default');
        if ($locale == $defaultLocale) {
            $page = Page::where('slug', $slug)->firstOrFail();
        } else {
            $page = Page::whereTranslation('slug', '=', $slug, [$locale], false)->withTranslation($locale)->firstOrFail();
        }
        Helper::checkModelActive($page);
        $breadcrumbs = new Breadcrumbs();

        $page->increment('views');
        $page->load('translations');

        return view('page.show', compact('breadcrumbs', 'page'));
    }

    public function print(Page $page)
    {
        $page->load('translations');
        return view('page.print', compact('page'));
    }

    public function guestbook()
    {
        $locale = app()->getLocale();
        $breadcrumbs = new Breadcrumbs();
        $page = Page::where('id', 20)->withTranslation($locale)->firstOrFail();
        $breadcrumbs->addItem(new LinkItem($page->getTranslatedAttribute('name'), $page->url, LinkItem::STATUS_INACTIVE));
        $reviews = Review::active()->where('reviewable_type', Page::class)->where('reviewable_id', 1)->paginate(20);
        $links = $reviews->links();
        return view('page.guestbook', compact('page', 'breadcrumbs', 'reviews', 'links'));
    }
}
