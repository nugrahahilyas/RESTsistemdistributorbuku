<?php

namespace App\Controllers;

use App\Models\Penerbit;
use CodeIgniter\RESTful\ResourceController;

class PenerbitController extends ResourceController
{
    protected $penerbit = 'App\Models\Penerbit';
    protected $format = 'json';

    public function __construct()
    {
        $this->penerbit = new Penerbit();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'message' => 'success',
            'data_penerbit' => $this->penerbit->orderBy('id', 'DESC')->findAll()
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

        $this->penerbit->insert([
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
        $id_penerbit = $this->penerbit->find($id);
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

        $this->penerbit->update($id, [
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
        $penerbit = $this->penerbit->getPenerbit($id);
        // if ($id == $penerbit['id']) {
        //     $this->penerbit->delete($id);
        //     $response = [
        //         'message' => 'data berhasil dihapus'
        //     ];
        //     return $this->respondDeleted($response);
        // }
        $response = [
            // 'message' => 'data tidak ditemukan'
            'message' => 'data tidak ditemukan'
        ];
        return $this->fail($response);
    }
}
