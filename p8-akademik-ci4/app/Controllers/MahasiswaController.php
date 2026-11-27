<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class MahasiswaController extends BaseController
{
    public function index()
    {
        $model = new MahasiswaModel();

        $data['mahasiswa'] = $model->findAll();

        return view('mahasiswa/index', $data);
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('mahasiswa/create');
    }

    // Menyimpan data mahasiswa
    public function store()
    {
        $model = new MahasiswaModel();

        $rules = [
            'nim' => 'required|min_length[5]|max_length[20]|is_unique[mahasiswa.nim]',
            'nama' => 'required|min_length[3]',
            'prodi' => 'required',
            'ipk' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[4]'
        ];

        if (!$this->validate($rules)) {
            return view('mahasiswa/create', [
                'validation' => $this->validator
            ]);
        }

        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'prodi' => $this->request->getPost('prodi'),
            'ipk' => $this->request->getPost('ipk')
        ];

        $model->insert($data);

        return redirect()->to('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    // Menampilkan form ubah
    public function edit($id)
    {
        $model = new MahasiswaModel();

        $data['mahasiswa'] = $model->find($id);

        return view('mahasiswa/edit', $data);
    }

    // Memperbarui data
    public function update($id)
    {
        $model = new MahasiswaModel();

        $rules = [
            'nim' => "required|min_length[5]|is_unique[mahasiswa.nim,id,{$id}]",
            'nama' => 'required|min_length[3]',
            'prodi' => 'required',
            'ipk' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[4]'
        ];

        if (!$this->validate($rules)) {
            return view('mahasiswa/edit', [
                'mahasiswa' => array_merge(
                    $model->find($id),
                    $this->request->getPost()
                ),
                'validation' => $this->validator
            ]);
        }

        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'prodi' => $this->request->getPost('prodi'),
            'ipk' => $this->request->getPost('ipk')
        ];

        $model->update($id, $data);

        return redirect()->to('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    // Menghapus data
    public function delete($id)
    {
        $model = new MahasiswaModel();

        $model->delete($id);

        return redirect()->to('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}