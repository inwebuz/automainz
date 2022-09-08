<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Page;
use App\Models\Photo;
use App\Models\Publication;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $locale = app()->getLocale();

        $page = Page::where('id', 1)->withTranslation($locale)->firstOrFail();

        // $slides = Helper::banners('slide');
        $slide = Helper::banner('slide');
        $articles = Publication::articles()->active()->withTranslation($locale)->latest()->take(3)->get();
        $photos = Photo::active()->withTranslation($locale)->latest()->take(10)->get();

        return view('home', compact('page', 'slide', 'articles', 'photos'));
    }
}
