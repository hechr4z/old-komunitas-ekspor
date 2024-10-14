<?php

namespace App\Controllers\admin;

use App\Models\DPCModels;
use App\Models\DPDModels;

class DPC extends BaseController
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

        $dpc_model = new DPCModels();
        $all_data_dpc = $dpc_model->getDPCAdmin();
        $validation = \Config\Services::validation();
        return view('admin/dpc/index', [
            'all_data_DPC' => $all_data_dpc,
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

        $dpc_model = new DPCModels();
        $dpd_model = new DPDModels();
        $all_data_dpc = $dpc_model->findAll();
        $all_data_dpd = $dpd_model->findAll();
        $validation = \Config\Services::validation();
        return view('admin/dpc/tambah', [
            'all_data_DPC' => $all_data_dpc,
            'all_data_DPD' => $all_data_dpd,
            'validation' => $validation
        ]);
    }
    public function proses_tambah()
    {
        $dpcModel = new DPCModels();
        $data = [
            'id_dpd' => $this->request->getVar("id_dpd"),
            'nama_dpc' => $this->request->getVar("nama_dpc"),
            'wilayah_kerja_dpc' => $this->request->getVar("wilayah_kerja_dpc"),
        ];
        $dpcModel->save($data);

        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/dpc/index'));
    }

    public function edit($id_dpc)
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

        $dpc_model = new DPCModels();
        $dpd_model = new DPDModels();
        $dpcData = $dpc_model->find($id_dpc);
        $dpdData = $dpd_model->findAll();
        $validation = \Config\Services::validation();

        return view('admin/dpc/edit', [
            'dpcData' => $dpcData,
            'dpdData' => $dpdData,
            'validation' => $validation
        ]);
    }

    public function proses_edit($id_dpc = null)
    {
        if (!$id_dpc) {
            return redirect()->back();
        }

        $dpcModel = new DPCModels();
        // $dpcData = $dpcModel->find($id_dpc);

        // Update the 'foto_produk' field in the database with a "where" clause
        $dpcModel->where('id_dpc', $id_dpc)->set([
            'id_dpd' => $this->request->getVar("id_dpd"),
            'nama_dpc' => $this->request->getVar("nama_dpc"),
            'wilayah_kerja_dpc' => $this->request->getVar("wilayah_kerja_dpc"),
        ])->update();

        session()->setFlashdata('success', 'Berkas berhasil diperbarui');
        return redirect()->to(base_url('admin/dpc/index'));
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

        $dpcModel = new DPCModels();

        $data = $dpcModel->find($id);

        $dpcModel->delete($id);

        return redirect()->to(base_url('admin/dpc/index'));
    }
}
