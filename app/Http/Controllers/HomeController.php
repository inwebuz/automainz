<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Page;
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

        // slides
        $slides = Helper::banners('slide');


        // articles
        $articles = Publication::articles()->active()->withTranslation($locale)->latest()->take(4)->get();

        return view('home', compact('page', 'slides', 'articles'));
    }
}
