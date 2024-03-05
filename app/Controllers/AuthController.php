<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\User;

class AuthController extends BaseController
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
        return view('login');
    }

    public function login()
    {
        $session = session();
        $model = new User();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $model->where('email', $email)->first();

        if ($data) {
            // Mengenkripsi kata sandi yang dimasukkan oleh pengguna untuk membandingkannya dengan kata sandi terenkripsi di database
            $hashedPassword = $data['password'];
            $isPasswordCorrect = password_verify($password, $hashedPassword);
            // dd($isPasswordCorrect);
            if ($isPasswordCorrect) {
                // Mendapatkan role name berdasarkan role_id
                $roleModel = new RoleModel();
                $roleData = $roleModel->find($data['role_id']);

                $ses_data = [
                    'user_id'   => $data['id'],
                    'role'      => $roleData['name'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                $this->setFlashAlert('success', 'Success', 'You Have Been Logged In');
                return redirect()->to('dashboard');
            } else {
                $this->setFlashAlert('error', 'Failed', 'Password Invalid');
                return redirect()->back();
            }
        } else {
            $this->setFlashAlert('error', 'Failed', 'Email Not Found');
            return redirect()->back();
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        $this->setFlashAlert('success', 'Success', 'You Have Been Logged Out');
        return redirect()->to('/');
    }

    public function register()
    {
        return view('register');
    }

    public function registering()
    {
        // Validasi data input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'username' => 'required|alpha_numeric',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/]',
            'alamat' => 'required',
            'telp' => 'required|numeric|max_length[13]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari input
        $name = $this->request->getPost('name');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $alamat = $this->request->getPost('alamat');
        $telp = $this->request->getPost('telp');
        $role_id = 2; // Set role_id otomatis menjadi 2 untuk pengguna yang mendaftar

        // Simpan data ke dalam database menggunakan model
        $User = new User();
        $User->insert([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT), // Encrypt password
            'alamat' => $alamat,
            'telp' => $telp,
            'role_id' => $role_id, // Menyimpan role_id secara otomatis
        ]);

        // Set pesan alert berhasil
        $this->setFlashAlert('success', 'Success', 'User has been registered successfully.');

        return redirect()->to('login'); // Redirect ke halaman login setelah registrasi
    }
}
