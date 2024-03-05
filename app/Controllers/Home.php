<?php

namespace App\Controllers;

use App\Models\NewsModel;
use App\Models\ProductModel;

class Home extends BaseController
{
    public function index()
    {
        // Memuat data news dari model
        $newsModel = new NewsModel();
        $newsData = $newsModel->findAll(); // Anda bisa menyesuaikan dengan metode pengambilan data yang sesuai

        // Memuat data product dari model
        $productModel = new ProductModel();
        $productData = $productModel->findAll(); // Anda bisa menyesuaikan dengan metode pengambilan data yang sesuai

        // Mengirim data ke view
        $data = [
            'news' => $newsData,
            'products' => $productData
        ];

        return view('homepage/home', $data);
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
