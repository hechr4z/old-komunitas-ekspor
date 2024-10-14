<?php

namespace App\Controllers\admin;

use App\Models\KeuntunganModel;
use App\Controllers\BaseController;

class Keuntungan extends BaseController
{
    public function index()
    {
        // Pengecekan apakah pengguna sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $keuntungan_model = new KeuntunganModel();
        $keuntungan = $keuntungan_model->findAll();

        return view('admin/Keuntungan/index', [
            'keuntungan' => $keuntungan
        ]);
    }

    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        return view('admin/Keuntungan/tambah');
    }

    public function proses_tambah()
    {
        // Validasi input
        if (!$this->validate([
            'icon_keuntungan' => [
                'rules' => 'uploaded[icon_keuntungan]|is_image[icon_keuntungan]|max_dims[icon_keuntungan,3000,3000]|mime_in[icon_keuntungan,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih icon terlebih dahulu',
                    'is_image' => 'File yang Anda pilih bukan gambar',
                    'max_dims' => 'Maksimal ukuran gambar 3000x3000 pixels',
                    'mime_in' => 'File yang Anda pilih wajib berekstensikan jpg/jpeg/png'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $file_icon = $this->request->getFile('icon_keuntungan');
        $file_icon->move('uploads/icons/');
        $icon_name = $file_icon->getName();

        $keuntungan_model = new KeuntunganModel();
        $data = [
            'judul_keuntungan' => $this->request->getVar('judul_keuntungan'),
            'deskripsi_keuntungan' => $this->request->getVar('deskripsi_keuntungan'),
            'icon_keuntungan' => $icon_name
        ];
        $keuntungan_model->save($data);

        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/keuntungan/index'));
    }

    public function edit($id_keuntungan)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $keuntungan_model = new KeuntunganModel();
        $keuntungan = $keuntungan_model->find($id_keuntungan);

        if (!$keuntungan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Keuntungan tidak ditemukan');
        }

        return view('admin/Keuntungan/edit', [
            'keuntungan' => $keuntungan
        ]);
    }

    public function proses_edit($id_keuntungan = null)
    {
        if (!$id_keuntungan) {
            return redirect()->back();
        }

        $keuntungan_model = new KeuntunganModel();
        $keuntunganData = $keuntungan_model->find($id_keuntungan);

        $file_icon = $this->request->getFile('icon_keuntungan');

        if ($file_icon && $file_icon->isValid() && !$file_icon->hasMoved()) {
            // Hapus file lama jika ada
            if (file_exists('uploads/icons/' . $keuntunganData['icon_keuntungan'])) {
                unlink('uploads/icons/' . $keuntunganData['icon_keuntungan']);
            }

            // Pindahkan file baru ke folder uploads
            $newIconName = $file_icon->getRandomName();
            $file_icon->move('uploads/icons/', $newIconName);

            // Simpan nama file baru di database
            $keuntungan_model->update($id_keuntungan, [
                'icon_keuntungan' => $newIconName,
                'judul_keuntungan' => $this->request->getVar('judul_keuntungan'),
                'deskripsi_keuntungan' => $this->request->getVar('deskripsi_keuntungan'),
            ]);
        } else {
            // Jika tidak ada file baru, hanya update data lainnya
            $keuntungan_model->update($id_keuntungan, [
                'judul_keuntungan' => $this->request->getVar('judul_keuntungan'),
                'deskripsi_keuntungan' => $this->request->getVar('deskripsi_keuntungan'),
            ]);
        }

        session()->setFlashdata('success', 'Data berhasil diperbarui');
        return redirect()->to(base_url('admin/keuntungan/index'));
    }

    public function delete($id_keuntungan)
    {
        // Pengecekan otentikasi dan hak akses
        if (!session()->get('logged_in') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $keuntungan_model = new KeuntunganModel();
        $keuntungan = $keuntungan_model->find($id_keuntungan);

        // Hapus file icon jika ada
        if ($keuntungan && !empty($keuntungan['icon_keuntungan'])) {
            $filePath = 'uploads/icons/' . $keuntungan['icon_keuntungan'];

            if (is_file($filePath)) {
                unlink($filePath); // Hapus file icon
            }
        }

        $keuntungan_model->delete($id_keuntungan); // Hapus data dari database

        session()->setFlashdata('success', 'Keuntungan berhasil dihapus');
        return redirect()->to(base_url('admin/keuntungan/index'));
    }
}
