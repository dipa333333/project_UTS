<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function kategori()
    {
        return view('pages.kategori');
    }

    public function tentang()
    {
        return view('pages.tentang');
    }
}
