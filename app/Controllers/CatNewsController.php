<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsCatModel;

class CatNewsController extends BaseController
{
    private function setFlashAlert($type, $title, $message)
    {
        // Set Sweet Alert menggunakan session flashdata
        session()->setFlashdata('alert', [
            'type' => $type,
            'title' => $title,
            'message' => $message
        ]);
    }

    public function index()
    {
        // Periksa sesi logged_in
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        // Jika sesi logged_in true, ambil data dari model dan tampilkan ke view
        $newsCatModel = new NewsCatModel();
        $data['categories'] = $newsCatModel->findAll();
        return view('catnews/index', $data);
    }

    public function store()
    {
        // Periksa sesi logged_in
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        // Validasi data input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari input
        $name = $this->request->getPost('name');

        // Simpan data ke dalam database menggunakan model
        $newsCatModel = new NewsCatModel();
        $newsCatModel->insert([
            'name' => $name,
        ]);

        // Set pesan alert berhasil
        $this->setFlashAlert('success', 'Success', 'Category has been added successfully.');

        return redirect()->back();
    }

    public function update($id)
    {
        // Periksa sesi logged_in
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        // Validasi data input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari input
        $name = $this->request->getPost('name');

        // Simpan data ke dalam database menggunakan model
        $newsCatModel = new NewsCatModel();
        $newsCatModel->update($id, [
            'name' => $name,
        ]);

        // Set pesan alert berhasil
        $this->setFlashAlert('success', 'Success', 'Category has been updated successfully.');

        return redirect()->back();
    }

    public function delete($id)
    {
        // Periksa sesi logged_in
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        // Cek apakah kategori dengan ID yang diberikan ada dalam database
        $newsCatModel = new NewsCatModel();
        $category = $newsCatModel->find($id);

        // Jika kategori tidak ditemukan, tampilkan pesan error atau redirect ke halaman yang sesuai
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        // Hapus kategori dari database
        $newsCatModel->delete($id);

        // Set pesan alert berhasil
        $this->setFlashAlert('success', 'Success', 'Category has been deleted successfully.');

        return redirect()->back();
    }
}
