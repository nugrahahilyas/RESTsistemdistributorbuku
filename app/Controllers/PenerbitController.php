<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class PenerbitController extends ResourceController
{
    protected $modelName = 'App\Models\Penerbit';
    protected $format = 'json';

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'message' => 'success',
            'data_penerbit' => $this->model->orderBy('id', 'DESC')->findAll()
        ];
        return $this->respond($data, 200);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = $this->validate([
            'id_penerbit' => 'required|is_unique[penerbit.id_penerbit]',
            'nama_penerbit' => 'required',
            'alamat' => 'required'
        ]);

        if (!$rules) {
            $response =  [
                'message' => $this->validator->getErrors()
            ];
            return $this->failValidationErrors($response);
        }

        $this->model->insert([
            'id_penerbit'   => esc($this->request->getVar('id_penerbit')),
            'nama_penerbit' => esc($this->request->getVar('nama_penerbit')),
            'alamat'        => esc($this->request->getVar('alamat')),
            'no_hp'         => esc($this->request->getVar('no_hp'))
        ]);
        $response = [
            'message' => 'data penerbit berhasil ditambah'
        ];
        return $this->respondCreated($response);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $id_penerbit = $this->model->find($id);
        if($id_penerbit['id_penerbit'] != esc($this->request->getVar('id_penerbit'))) {
            $rule_id_penerbit = 'required|is_unique[penerbit.id_penerbit]';
        } else {
            $rule_id_penerbit = 'required';
        }
        $rules = $this->validate([
            'id_penerbit' => $rule_id_penerbit,
            'nama_penerbit' => 'required',
            'alamat' => 'required'
        ]);

        if (!$rules) {
            $response =  [
                'message' => $this->validator->getErrors()
            ];
            return $this->failValidationErrors($response);
        }

        $this->model->update($id, [
            'id_penerbit'   => esc($this->request->getVar('id_penerbit')),
            'nama_penerbit' => esc($this->request->getVar('nama_penerbit')),
            'alamat'        => esc($this->request->getVar('alamat')),
            'no_hp'         => esc($this->request->getVar('no_hp'))
        ]);
        $response = [
            'message' => 'data penerbit berhasil diubah'
        ];
        return $this->respond($response, 200);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->model->delete($id);
        $response = [
            'message' => 'data berhasil dihapus'
        ];
        return $this->respondDeleted($response);
    }
}
