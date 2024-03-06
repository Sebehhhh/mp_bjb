<?php

namespace App\Controllers;

use App\Models\NewsModel;
use App\Models\ProductCatModel;
use App\Models\ProductModel;
use App\Models\SellerModel;
use App\Models\User;

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

        // Memuat data user dari model
        $userModel = new User();

        // Membuat array baru untuk menyimpan data berita dengan nama pengguna
        $newsWithUserNames = [];
        foreach ($newsData as $news) {
            // Mendapatkan nama pengguna dari id pengguna yang membuat berita
            $userData = $userModel->find($news['created_by']); // Anda bisa menyesuaikan dengan metode pengambilan data yang sesuai

            // Menyimpan data berita bersama dengan nama pengguna
            $news['user_name'] = $userData['name']; // Menambahkan user_name ke dalam data berita
            $newsWithUserNames[] = $news;
        }

        // Membuat array baru untuk menyimpan data produk dengan nama penjual
        $productsWithSellerNames = [];
        foreach ($productData as $product) {
            // Mendapatkan nama penjual dari id penjual yang terdapat di produk
            $sellerModel = new SellerModel();
            $sellerData = $sellerModel->find($product['seller_id']); // Anda bisa menyesuaikan dengan metode pengambilan data yang sesuai

            // Menyimpan data produk bersama dengan nama penjual
            $product['seller_name'] = $sellerData['name']; // Menambahkan seller_name ke dalam data produk
            $productsWithSellerNames[] = $product;
        }

        // Mengirim data ke view
        $data = [
            'news' => $newsWithUserNames, // Menggunakan data berita yang telah diperbarui dengan nama pengguna
            'products' => $productsWithSellerNames // Menggunakan data produk yang telah diperbarui dengan nama penjual
        ];

        return view('homepage/home', $data);
    }


    // public function calendar()
    // {
    //     return view('homepage/calendar');
    // }

    public function about()
    {
        return view('homepage/about');
    }

    public function allProducts()
    {
        $productModel = new ProductModel();

        // Mendapatkan data produk dengan paginasi per 10
        $products = $productModel->paginate(8); // Mengatur jumlah item per halaman menjadi 10

        // Mendapatkan data penjual dan kategori untuk setiap produk dan menyimpan nama penjual dan nama kategori di dalamnya
        foreach ($products as &$product) {
            // Mengambil data penjual berdasarkan seller_id dari produk
            $sellerModel = new SellerModel();
            $sellerData = $sellerModel->find($product['seller_id']);
            // Mengambil data kategori produk berdasarkan cat_id dari produk
            $categoryProductModel = new ProductCatModel();
            $categoryProductData = $categoryProductModel->find($product['cat_id']);

            // Menyimpan nama penjual dan nama kategori ke dalam data produk
            $product['seller_name'] = $sellerData['name'];
            $product['category_name'] = $categoryProductData['name'];
        }

        // Membuat link paginasi untuk tampilan
        $pager = $productModel->pager;

        return view('homepage/allProducts', [
            'products' => $products,
            'pager' => $pager
        ]);
    }



    // public function seller()
    // {
    //     return view('homepage/seller');
    // }

    public function news()
    {
        return view('homepage/news');
    }
}
