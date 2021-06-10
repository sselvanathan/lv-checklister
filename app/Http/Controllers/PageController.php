<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function welcome(): View
    {
        $page = Page::findorFail(1);

        return view('page', compact('page'));
    }

    public function consultation(): View
    {
        $page = Page::findorFail(2);

        return view('page', compact('page'));
    }
}
