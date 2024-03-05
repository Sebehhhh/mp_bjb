<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductCatModel;
use App\Models\ProductModel;
use App\Models\SellerModel;

class ProductController extends BaseController
{
    private function setFlashAlert($type, $title, $message)
    {
        session()->setFlashdata('alert', [
            'type' => $type,
            'title' => $title,
            'message' => $message
        ]);
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        $productModel = new ProductModel();
        $products = $productModel->findAll();

        $sellerModel = new SellerModel();
        $sellers = $sellerModel->findAll();
        $sellersAll = $sellerModel->findAll();

        $categoryModel = new ProductCatModel();
        $categories = $categoryModel->findAll();
        $categoriesAll = $categoryModel->findAll();

        // Loop melalui setiap produk
        foreach ($products as &$product) {
            // Ambil nama penjual (seller) berdasarkan seller_id
            foreach ($sellers as $seller) {
                if ($seller['id'] == $product['seller_id']) {
                    $product['seller_name'] = $seller['name']; // Simpan nama penjual dalam array produk
                    break;
                }
            }

            // Ambil nama kategori (category) berdasarkan cat_id
            foreach ($categories as $category) {
                if ($category['id'] == $product['cat_id']) {
                    $product['category_name'] = $category['name']; // Simpan nama kategori dalam array produk
                    break;
                }
            }
        }

        $data['products'] = $products;
        $data['sellersAll'] = $sellersAll;
        $data['categoriesAll'] = $categoriesAll;

        return view('product/index', $data);
    }




    public function store()
    {
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'cat_id' => 'required',
            'seller_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stok' => 'required|numeric',
            'picture' => 'uploaded[picture]|max_size[picture,2048]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $cat_id = $this->request->getPost('cat_id');
        $seller_id = $this->request->getPost('seller_id');
        $name = $this->request->getPost('name');
        $price = $this->request->getPost('price');
        $stok = $this->request->getPost('stok');
        $picture = $this->request->getFile('picture');
        $createdBy = session()->get('user_id');

        $newPictureName = $picture->getRandomName();
        $picture->move(ROOTPATH . 'public/uploads/products', $newPictureName);

        $productModel = new ProductModel();
        $productModel->insert([
            'cat_id' => $cat_id,
            'seller_id' => $seller_id,
            'name' => $name,
            'price' => $price,
            'stok' => $stok,
            'picture' => $newPictureName,
            'created_by' => $createdBy
        ]);

        $this->setFlashAlert('success', 'Success', 'Product has been added successfully.');

        return redirect()->back();
    }

    public function update($id)
    {
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        $validation = \Config\Services::validation();

        // Set aturan validasi untuk bidang lainnya
        $validation->setRules([
            'cat_id' => 'required',
            'seller_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stok' => 'required|numeric',
        ]);

        // Cek apakah ada file gambar yang diunggah
        if ($this->request->getFile('picture')->isValid()) {
            // Jika ada file gambar yang diunggah, tambahkan validasi untuk gambar
            $validation->setRules([
                'picture' => 'uploaded[picture]|max_size[picture,2048]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]'
            ]);
        }

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $cat_id = $this->request->getPost('cat_id');
        $seller_id = $this->request->getPost('seller_id');
        $name = $this->request->getPost('name');
        $price = $this->request->getPost('price');
        $stok = $this->request->getPost('stok');
        $picture = $this->request->getFile('picture');
        $updatedBy = session()->get('user_id');

        $newPictureName = '';

        // Periksa apakah ada file gambar yang diunggah
        if ($picture->isValid() && !$picture->hasMoved()) {
            $newPictureName = $picture->getRandomName();
            $picture->move(ROOTPATH . 'public/uploads/products', $newPictureName);
        }

        $productModel = new ProductModel();
        $productData = [
            'cat_id' => $cat_id,
            'seller_id' => $seller_id,
            'name' => $name,
            'price' => $price,
            'stok' => $stok,
            'updated_by' => $updatedBy
        ];

        // Jika ada file gambar yang diunggah, tambahkan nama gambar baru ke data produk
        if ($newPictureName != '') {
            $productData['picture'] = $newPictureName;
        }

        // Update data produk
        $productModel->update($id, $productData);

        $this->setFlashAlert('success', 'Success', 'Product has been updated successfully.');

        return redirect()->back();
    }


    public function delete($id)
    {
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        $productModel = new ProductModel();
        $product = $productModel->find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        if (file_exists(ROOTPATH . 'public/uploads/products/' . $product['picture'])) {
            unlink(ROOTPATH . 'public/uploads/products/' . $product['picture']);
        }

        $productModel->delete($id);

        $this->setFlashAlert('success', 'Success', 'Product has been deleted successfully.');

        return redirect()->back();
    }
}
