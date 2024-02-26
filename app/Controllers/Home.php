<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('homepage/home');
    }

    public function calendar()
    {
        return view('homepage/calendar');
    }

    public function about()
    {
        return view('homepage/about');
    }

    public function allProducts()
    {
        return view('homepage/allProducts');
    }

    public function seller()
    {
        return view('homepage/seller');
    }

    public function news()
    {
        return view('homepage/news');
    }
}
