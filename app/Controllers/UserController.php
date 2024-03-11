<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
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
        $User = new User();

        // Ambil semua role
        $roleModel = new RoleModel();
        $users = $User->withDeleted()->findAll();

        // Loop through each user to fetch role name
        foreach ($users as &$user) {
            $roleData = $roleModel->find($user['role_id']);
            if ($roleData !== null && array_key_exists('name', $roleData)) {
                $user['role_name'] = $roleData['name'];
            } else {
                // Handle jika data role tidak ditemukan atau 'name' tidak ada
                $user['role_name'] = 'Unknown Role';
            }
        }

        $roles = $roleModel->findAll();
        $data['users'] = $users;
        $data['roles'] = $roles; // Mengirimkan data role ke view
        return view('users/index', $data);
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
            'name' => 'required',
            'username' => 'required|alpha_numeric',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/]',
            'alamat' => 'required',
            'role_id' => 'required',
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
        $role_id = $this->request->getPost('role_id'); // Mengambil role_id dari dropdown

        // Ambil ID pengguna dari sesi user_id
        $createdById = session()->get('user_id');

        // Simpan data ke dalam database menggunakan model
        $User = new User();
        $User->insert([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT), // Encrypt password
            'alamat' => $alamat,
            'telp' => $telp,
            'role_id' => $role_id, // Menyimpan role_id yang diperoleh dari dropdown
            'created_by' => $createdById, // Menyimpan ID pengguna yang membuat entri
        ]);

        // Set pesan alert berhasil
        $this->setFlashAlert('success', 'Success', 'User has been added successfully.');

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
            'name' => 'required',
            'username' => 'required|alpha_numeric',
            'email' => 'required|valid_email',
            'alamat' => 'required',
            'role_id' => 'required',
            'telp' => 'required|numeric|max_length[13]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari input
        $name = $this->request->getPost('name');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $alamat = $this->request->getPost('alamat');
        $telp = $this->request->getPost('telp');
        $role_id = $this->request->getPost('role_id'); // Mengambil role_id dari dropdown

        // Periksa apakah password diubah
        $password = $this->request->getPost('password');
        $userData = [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'alamat' => $alamat,
            'telp' => $telp,
            'role_id' => $role_id,
            'updated_by' => session()->get('user_id'), // Mengambil ID pengguna dari sesi untuk updated_by
        ];

        if (!empty($password)) {
            // Jika password diubah, hash password baru
            $userData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // Simpan data ke dalam database menggunakan model
        $User = new User();
        $User->update($id, $userData);

        // Set pesan alert berhasil
        $this->setFlashAlert('success', 'Success', 'User has been updated successfully.');

        return redirect()->back();
    }


    public function delete($id)
    {
        // Periksa sesi logged_in
        if (!session()->get('logged_in')) {
            return view('errors/html/error_401');
        }

        // Cek apakah pengguna dengan ID yang diberikan ada dalam database
        $User = new User();
        $user = $User->find($id);

        // Jika pengguna tidak ditemukan, tampilkan pesan error atau redirect ke halaman yang sesuai
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Hapus pengguna dari database
        $User->delete($id);

        // Set pesan alert berhasil
        $this->setFlashAlert('success', 'Success', 'User has been deleted successfully.');

        return redirect()->back();
    }
}
