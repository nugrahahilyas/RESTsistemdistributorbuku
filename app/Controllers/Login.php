<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UsersModel;
use Firebase\JWT\JWT;
use Firebase\JWT\key;


class Login extends ResourceController
{
    public function index()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];
       
        if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        
        $model = new UsersModel();
        $user = $model->where('email', $this->request->getVar('email'))->first();
       
        if (!$user) return $this->failNotFound('email tidak ditemukan');

        $verify = password_verify($this->request->getVar('password'), $user['password']);
        if (!$verify) return $this->fail('Password Salah');

        $key = getenv('TOKEN_RAHASIA');
        $payload = [
            'iat' => 1356999524,
            'nbf' => 1357000000,
            'uid' => $user['id'],
            'email' => $user['email']
        ];

        $token = JWT::encode($payload, $key, 'HS256');

        return $this->respond($token);
    }

}
