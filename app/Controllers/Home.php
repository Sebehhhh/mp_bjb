<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\NewsModel;
use App\Models\ProductCatModel;
use App\Models\ProductModel;
use App\Models\SellerModel;
use App\Models\User;

class Home extends BaseController
{
    public function index()
    {
        $newsModel = new NewsModel();
        $newsData = $newsModel->findAll();

        $productModel = new ProductModel();
        $productData = $productModel->findAll();

        $eventModel = new EventModel();
        $eventData = $eventModel->findAll();

        $userModel = new User();
        $newsWithUserNames = [];
        foreach ($newsData as $news) {
            $userData = $userModel->find($news['created_by']);
            $news['user_name'] = $userData['name'];
            $newsWithUserNames[] = $news;
        }

        $productsWithSellerNames = [];
        foreach ($productData as $product) {
            $sellerModel = new SellerModel();
            $sellerData = $sellerModel->find($product['seller_id']);
            $product['seller_name'] = $sellerData['name'];
            $product['serial'] = $sellerData['serial'];
            $product['seller_kode'] = $sellerData['kode'];
            $productsWithSellerNames[] = $product;
        }

        // Fungsi untuk mengurutkan produk berdasarkan seller_kode
        usort($productsWithSellerNames, function ($a, $b) {
            return $a['seller_kode'] <=> $b['seller_kode'];
        });

        $data = [
            'news' => $newsWithUserNames,
            'events' => $eventData,
            'products' => $productsWithSellerNames
        ];

        return view('homepage/home', $data);
    }


    public function about()
    {
        return view('homepage/about');
    }

    public function allProducts()
    {
        $productModel = new ProductModel();
        $sellerModel = new SellerModel();
        $categoryProductModel = new ProductCatModel();

        $search = $this->request->getGet('search');
        $keyword = $this->request->getGet('keyword');
        $sellerId = $this->request->getGet('seller');
        $categoryId = $this->request->getGet('category');

        $productsQuery = $productModel->orderBy('id', 'DESC');
        if (!empty($search)) {
            $productsQuery->like('name', $search);
        }
        if (!empty($keyword)) {
            $productsQuery->like('name', $keyword);
        }
        // dd($keyword);
        if (!empty($sellerId)) {
            $productsQuery->where('seller_id', $sellerId);
        }

        if (!empty($categoryId)) {
            $productsQuery->where('cat_id', $categoryId);
        }

        $products = $productsQuery->paginate(8);
        // dd($products);
        $sellers = $sellerModel->findAll();
        $categories = $categoryProductModel->findAll();

        foreach ($products as &$product) {
            $sellerData = $sellerModel->find($product['seller_id']);
            $categoryProductData = $categoryProductModel->find($product['cat_id']);
            $product['seller_name'] = $sellerData['name'];
            $product['seller_picture'] = $sellerData['picture'];
            $product['category_name'] = $categoryProductData['name'];
            // dd($product);
        }
        $pager = $productModel->pager;

        return view('homepage/allProducts', [
            'products' => $products,
            'sellers' => $sellers,
            'categories' => $categories,
            'pager' => $pager
        ]);
    }


    public function news()
    {
        // Tangkap ID dari parameter query string
        $newsId = $this->request->getGet('id');

        // Cari data berita berdasarkan ID
        $newsModel = new NewsModel();
        $newsItem = $newsModel->find($newsId);

        // Jika data berita ditemukan, tambahkan informasi penulis
        if (!empty($newsItem)) {
            // Ambil informasi penulis berdasarkan created_by dari data berita
            $authorId = $newsItem['created_by']; // Ubah sesuai dengan nama kolom yang tepat di tabel berita
            $authorModel = new User(); // Gantilah UserModel dengan nama model pengguna Anda
            $authorInfo = $authorModel->find($authorId);

            // Jika informasi penulis ditemukan, tambahkan ke data berita
            if (!empty($authorInfo)) {
                $newsItem['author'] = $authorInfo['name']; // Ubah 'name' sesuai dengan nama kolom yang berisi nama penulis di tabel pengguna
            }
        }

        // Kirim data berita ke tampilan berita
        return view('homepage/news', ['newsItem' => $newsItem]);
    }

    public function allNews()
    {
        // Buat instance model berita
        $newsModel = new NewsModel();

        // Konfigurasi pagination
        $pager = \Config\Services::pager();
        $perPage = 8; // Jumlah berita per halaman

        // Ambil semua berita dengan pagination
        $allNews = $newsModel->paginate($perPage);

        // Jika terdapat berita, tambahkan informasi penulis untuk setiap berita
        if (!empty($allNews)) {
            // Buat instance model pengguna
            $authorModel = new User(); // Gantilah UserModel dengan nama model pengguna Anda

            // Iterasi setiap berita
            foreach ($allNews as &$newsItem) {
                // Ambil informasi penulis berdasarkan created_by dari data berita
                $authorId = $newsItem['created_by']; // Ubah sesuai dengan nama kolom yang tepat di tabel berita
                $authorInfo = $authorModel->find($authorId);

                // Jika informasi penulis ditemukan, tambahkan ke data berita
                if (!empty($authorInfo)) {
                    $newsItem['author'] = $authorInfo['name']; // Ubah 'name' sesuai dengan nama kolom yang berisi nama penulis di tabel pengguna
                }
            }
        }

        // Tampilkan pagination
        $pager->setPath(''); // Atur path pagination, kosongkan jika menggunakan default

        // Kirim semua berita dan pagination ke tampilan
        return view('homepage/all_news', [
            'allNews' => $allNews,
            'pager' => $pager
        ]);
    }
}
