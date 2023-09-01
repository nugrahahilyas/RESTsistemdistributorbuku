<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UsersModel;

class Login extends ResourceController
{
    public function index()
    {
        $model = new UsersModel();
        $rules = [
            'email' => 'email|valid_email',
            'password' => 'required|'
        ];
        $user = $model->find($this->request->getVar('email'));
        if (!$user) return $this->failNotFound('email tidak ditemukan');

        $verify = password_verify($this->request->getVar('password'), $user['password']);
        if (!$verify) return $this->fail('Password Salah');

        return $this->respond('OK');
    }

}
