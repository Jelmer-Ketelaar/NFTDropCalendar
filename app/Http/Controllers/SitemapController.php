<?php

namespace App\Http\Controllers;

use App\Models\Drop;
use Illuminate\Http\Response;

final class SitemapController extends Controller
{
    public function index(): Response
    {
        $drops = Drop::where('verified', 'true')->orderBy('id')->get();

        return response()->view('seo.sitemap', compact('drops'))
            ->header('Content-Type', 'application/xml');
    }

    public function robots(): Response
    {
        return response()->view('seo.robots')
            ->header('Content-Type', 'text/plain');
    }
}
