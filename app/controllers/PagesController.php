<?php

namespace App\Controllers;

class PagesController {
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function notFound()
    {
        return view('404');
    }
}
