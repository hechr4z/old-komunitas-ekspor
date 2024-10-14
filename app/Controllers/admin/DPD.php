<?php

namespace App\Controllers\admin;

use App\Models\DPDModels;

class DPD extends BaseController
{

    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
            // Ubah 'login' sesuai dengan halaman login Anda
        }

        // Periksa peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            // Jika peran bukan admin, arahkan ke halaman lain (misal: user)
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }

        $dpd_model = new DPDModels();
        $all_data_dpd = $dpd_model->findAll();
        $validation = \Config\Services::validation();
        return view('admin/dpd/index', [
            'all_data_DPD' => $all_data_dpd,
            'validation' => $validation
        ]);
    }
    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
            // Ubah 'login' sesuai dengan halaman login Anda
        }

        // Periksa peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            // Jika peran bukan admin, arahkan ke halaman lain (misal: user)
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }

        $dpd_model = new DPDModels();
        $all_data_dpd = $dpd_model->findAll();
        $validation = \Config\Services::validation();
        return view('admin/dpd/tambah', [
            'all_data_DPD' => $all_data_dpd,
            'validation' => $validation
        ]);
    }
    public function proses_tambah()
    {
        $dpdModel = new DPDModels();
        $data = [
            'nama_dpd' => $this->request->getVar("nama_dpd"),
        ];
        $dpdModel->save($data);

        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/dpd/index'));
    }

    public function edit($id_dpd)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
            // Ubah 'login' sesuai dengan halaman login Anda
        }

        // Periksa peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            // Jika peran bukan admin, arahkan ke halaman lain (misal: user)
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }

        $dpd_model = new DPDModels();
        $dpdData = $dpd_model->find($id_dpd);
        $validation = \Config\Services::validation();

        return view('admin/dpd/edit', [
            'dpdData' => $dpdData,
            'validation' => $validation
        ]);
    }

    public function proses_edit($id_dpd = null)
    {
        if (!$id_dpd) {
            return redirect()->back();
        }

        $dpdModel = new DPDModels();
        $dpdData = $dpdModel->find($id_dpd);

        // Update the 'foto_produk' field in the database with a "where" clause
        $dpdModel->where('id_dpd', $id_dpd)->set([
            'nama_dpd' => $this->request->getPost("nama_dpd"),
        ])->update();

        session()->setFlashdata('success', 'Berkas berhasil diperbarui');
        return redirect()->to(base_url('admin/dpd/index'));
    }

    public function delete($id = false)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
            // Ubah 'login' sesuai dengan halaman login Anda
        }

        // Periksa peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            // Jika peran bukan admin, arahkan ke halaman lain (misal: user)
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }

        $dpdModel = new DPDModels();

        $data = $dpdModel->find($id);

        $dpdModel->delete($id);

        return redirect()->to(base_url('admin/dpd/index'));
    }
}
