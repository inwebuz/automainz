<?php

namespace App\Http\Controllers;

use App\Models\Car;

class RssController extends Controller
{

    public function index()
    {
        $locale = app()->getLocale();
        $cars = Car::active()->latest()
            ->withTranslation($locale)
            ->take(50)->get();

        return response()
            ->view('rss', compact('cars'))
            ->withHeaders([
                'Content-Type' => 'text/xml'
            ]);
    }
}
