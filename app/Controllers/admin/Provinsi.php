<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

use App\Models\ProvinsiModels;

class Provinsi extends BaseController
{
    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        // Periksa peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $provinsi_model = new ProvinsiModels();
        $all_data_provinsi = $provinsi_model->findAll();
        $validation = \Config\Services::validation();
        return view('admin/Provinsi/index', [
            'all_data_Provinsi' => $all_data_provinsi,
            'validation' => $validation
        ]);
    }

    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        // Periksa peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $validation = \Config\Services::validation();
        return view('admin/Provinsi/tambah', [
            'validation' => $validation
        ]);
    }

    public function proses_tambah()
    {
        $provinsiModel = new ProvinsiModels();
        $data = [
            'nama_provinsi' => $this->request->getVar("nama_provinsi"),
        ];
        $provinsiModel->save($data);

        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/Provinsi/index'));
    }

    public function edit($id_provinsi)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        // Periksa peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $provinsi_model = new ProvinsiModels();
        $provinsiData = $provinsi_model->find($id_provinsi);
        $validation = \Config\Services::validation();

        return view('admin/Provinsi/edit', [
            'provinsiData' => $provinsiData,
            'validation' => $validation
        ]);
    }

    public function proses_edit($id_provinsi = null)
    {
        if (!$id_provinsi) {
            return redirect()->back();
        }

        $provinsiModel = new ProvinsiModels();
        $provinsiModel->where('id_provinsi', $id_provinsi)->set([
            'nama_provinsi' => $this->request->getPost("nama_provinsi"),
        ])->update();

        session()->setFlashdata('success', 'Berkas berhasil diperbarui');
        return redirect()->to(base_url('admin/Provinsi/index'));
    }

    public function delete($id = false)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        // Periksa peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $provinsiModel = new ProvinsiModels();
        $provinsiModel->delete($id);

        return redirect()->to(base_url('admin/Provinsi/index'));
    }
}