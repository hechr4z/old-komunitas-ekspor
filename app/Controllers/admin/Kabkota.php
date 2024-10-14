<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

use App\Models\KabkotaModels;
use App\Models\ProvinsiModels;

class Kabkota extends BaseController
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

        $kabkota_model = new KabkotaModels();
        $all_data_kabkota = $kabkota_model->getKabkotaAdmin();
        $validation = \Config\Services::validation();
        return view('admin/Kabkota/index', [
            'all_data_Kabkota' => $all_data_kabkota,
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

        $provinsi_model = new ProvinsiModels();
        $all_data_provinsi = $provinsi_model->findAll();
        $validation = \Config\Services::validation();
        return view('admin/Kabkota/tambah', [
            'all_data_Provinsi' => $all_data_provinsi,
            'validation' => $validation
        ]);
    }

    public function proses_tambah()
    {
        $kabkotaModel = new KabkotaModels();
        $data = [
            'id_provinsi' => $this->request->getVar("id_provinsi"),
            'nama_kabkota' => $this->request->getVar("nama_kabkota"),
            'wilayah_kerja_kabkota' => $this->request->getVar("wilayah_kerja_kabkota"),
        ];
        $kabkotaModel->save($data);

        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/Kabkota/index'));
    }

    public function edit($id_kabkota)
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

        $kabkota_model = new KabkotaModels();
        $provinsi_model = new ProvinsiModels();
        $kabkotaData = $kabkota_model->find($id_kabkota);
        $all_data_provinsi = $provinsi_model->findAll();
        $validation = \Config\Services::validation();

        return view('admin/Kabkota/edit', [
            'kabkotaData' => $kabkotaData,
            'all_data_Provinsi' => $all_data_provinsi,
            'validation' => $validation
        ]);
    }

    public function proses_edit($id_kabkota = null)
    {
        if (!$id_kabkota) {
            return redirect()->back();
        }

        $kabkotaModel = new KabkotaModels();
        $kabkotaModel->where('id_kabkota', $id_kabkota)->set([
            'id_provinsi' => $this->request->getVar("id_provinsi"),
            'nama_kabkota' => $this->request->getVar("nama_kabkota"),
            'wilayah_kerja_kabkota' => $this->request->getVar("wilayah_kerja_kabkota"),
        ])->update();

        session()->setFlashdata('success', 'Berkas berhasil diperbarui');
        return redirect()->to(base_url('admin/Kabkota/index'));
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

        $kabkotaModel = new KabkotaModels();
        $kabkotaModel->delete($id);

        return redirect()->to(base_url('admin/Kabkota/index'));
    }
}