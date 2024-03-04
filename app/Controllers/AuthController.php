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
}
