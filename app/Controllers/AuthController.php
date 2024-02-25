<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class AuthController extends BaseController
{
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
            $pass = $data['password'];
            if ($pass == $password) {
                $ses_data = [
                    'user_id'       => $data['id'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('dashboard');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('login');
            }
        } else {
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/login');
        }
    }
}
