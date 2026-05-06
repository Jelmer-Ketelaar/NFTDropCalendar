<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

final class FaqController extends Controller
{
    public function index(): View
    {
        return view('faq.index', [
            'pageTitle' => 'FAQ',
            'currentPage' => 'faq',
        ]);
    }
}
