<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UsersModel;

class Users extends ResourceController
{
    public function index()
    {
        $model = new UsersModel();
        
        $rules = [
            'email'         => 'required|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[3]',
            'confpassword'  => 'required|matches[password]'
        ];

        if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $data = [
            'email'     => esc($this->request->getVar('email')),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];
        
        $model->save($data);

        $response = [
            'message' => 'anda berhasil mendaftar'
        ];

        return $this->respondCreated($response);   
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    
    public function create()
    {
        
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
