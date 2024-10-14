<?php

namespace App\Controllers\admin;

use App\Models\PengumumanModels;

class Pengumuman extends BaseController
{
    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
            // Ubah 'login' sesuai dengan halaman login Anda
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            // Jika peran bukan admin, arahkan ke halaman lain (misal: user)
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }

        $pengumuman_model = new PengumumanModels();
        $all_data_pengumuman = $pengumuman_model->findAll();
        $validation = \Config\Services::validation();
        return view('admin/pengumuman/index', [
            'all_data_pengumuman' => $all_data_pengumuman,
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

        $role = session()->get('role');
        if ($role !== 'admin') {
            // Jika peran bukan admin, arahkan ke halaman lain (misal: user)
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }

        $pengumuman_model = new PengumumanModels();
        $all_data_pengumuman = $pengumuman_model->findAll();
        $validation = \Config\Services::validation();
        return view('admin/pengumuman/tambah', [
            'all_data_pengumuman' => $all_data_pengumuman,
            'validation' => $validation
        ]);
    }

    public function proses_tambah()
    {
        // Validasi input
        if (!$this->validate([
            'poster_pengumuman' => [
                'rules' => 'uploaded[poster_pengumuman]|is_image[poster_pengumuman]|max_dims[poster_pengumuman,3000,3000]|mime_in[poster_pengumuman,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'max_dims' => 'Maksimal ukuran gambar 3000x3000 pixels',
                    'mime_in' => 'File yang anda pilih wajib berekstensikan jpg/jpeg/png'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Buat slug otomatis dari judul dan tambahkan tanggal ddmmyyyy
            $judul = $this->request->getVar('judul_pengumuman');
            $tanggal = date('dmY'); // Format tanggal ddmmyyyy
            $slug = url_title($judul, '-', true) . '-' . $tanggal; // Menghasilkan slug + tanggal

            $file_foto = $this->request->getFile('poster_pengumuman');

            // Cek apakah file valid dan belum dipindahkan
            if ($file_foto->isValid() && !$file_foto->hasMoved()) {
                // Buat nama file dengan format slug
                $file_name = $slug . '.' . $file_foto->getClientExtension();

                // Pindahkan file ke direktori uploads/foto_pengumuman
                $file_foto->move('uploads/foto_pengumuman', $file_name);

                // Siapkan data untuk disimpan
                $PengumumanModels = new PengumumanModels();
                $data = [
                    'judul_pengumuman' => $this->request->getVar('judul_pengumuman'),
                    'deskripsi_pengumuman' => $this->request->getVar('deskripsi_pengumuman'),
                    'mulai_pengumuman' => $this->request->getVar('mulai_pengumuman'),
                    'akhir_pengumuman' => $this->request->getVar('akhir_pengumuman'),
                    'poster_pengumuman' => $file_name,
                    'slug' => $slug
                ];
                $PengumumanModels->save($data);

                session()->setFlashdata('success', 'Data berhasil disimpan');
                return redirect()->to(base_url('admin/pengumuman/index'));
            } else {
                session()->setFlashdata('error', 'Terjadi kesalahan dalam upload file.');
                return redirect()->back()->withInput();
            }
        }
    }


    public function edit($id_pengumuman)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
            // Ubah 'login' sesuai dengan halaman login Anda
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            // Jika peran bukan admin, arahkan ke halaman lain (misal: user)
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }

        $pengumuman_model = new PengumumanModels();
        $pengumumanData = $pengumuman_model->find($id_pengumuman);
        $validation = \Config\Services::validation();

        return view('admin/pengumuman/edit', [
            'pengumumanData' => $pengumumanData,
            'validation' => $validation
        ]);
    }

    // Penulis.php (Controller)
    public function proses_edit($id_pengumuman = null)
    {
        if (!$id_pengumuman) {
            return redirect()->back();
        }

        $PengumumanModels = new PengumumanModels();
        $pengumumanData = $PengumumanModels->find($id_pengumuman);

        // Buat slug otomatis dari judul dan tambahkan tanggal ddmmyyyy
        $judul = $this->request->getVar('judul_pengumuman');
        $tanggal = date('dmY'); // Format tanggal ddmmyyyy
        $slug = url_title($judul, '-', true) . '-' . $tanggal; // Menghasilkan slug + tanggal

        // Cek apakah file baru diunggah
        $file_foto = $this->request->getFile('poster_pengumuman');

        if ($file_foto && $file_foto->isValid() && !$file_foto->hasMoved()) {
            // Hapus file lama jika ada
            if (file_exists('uploads/foto_pengumuman/' . $pengumumanData->poster_pengumuman)) {
                unlink('uploads/foto_pengumuman/' . $pengumumanData->poster_pengumuman);
            }

            // Buat nama file dengan format slug
            $file_name = $slug . '.' . $file_foto->getClientExtension();

            // Pindahkan file ke direktori uploads/foto_pengumuman
            $file_foto->move('uploads/foto_pengumuman', $file_name);

            // Update data termasuk foto_pengumuman
            $data = [
                'poster_pengumuman' => $file_name,
                'judul_pengumuman' => $this->request->getVar("judul_pengumuman"),
                'deskripsi_pengumuman' => $this->request->getVar("deskripsi_pengumuman"),
                'mulai_pengumuman' => $this->request->getVar("mulai_pengumuman"),
                'akhir_pengumuman' => $this->request->getVar("akhir_pengumuman"),
                'slug' => $slug,
            ];
        } else {
            // Jika tidak ada file baru, update hanya data lainnya
            $data = [
                'judul_pengumuman' => $this->request->getVar("judul_pengumuman"),
                'deskripsi_pengumuman' => $this->request->getVar("deskripsi_pengumuman"),
                'mulai_pengumuman' => $this->request->getVar("mulai_pengumuman"),
                'akhir_pengumuman' => $this->request->getVar("akhir_pengumuman"),
                'slug' => $slug,
            ];
        }

        // Update data di database
        $PengumumanModels->update($id_pengumuman, $data);

        session()->setFlashdata('success', 'Berkas berhasil diperbarui');
        return redirect()->to(base_url('admin/pengumuman/index'));
    }





    public function delete($id = false)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login Anda
        }

        // Pengecekan peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }

        $PengumumanModels = new PengumumanModels();

        // Cari data pengumuman berdasarkan ID
        $data = $PengumumanModels->find($id);

        if ($data) {
            // Hapus file gambar jika ada
            $filePath = 'uploads/foto_pengumuman/' . $data->poster_pengumuman;
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Hapus data pengumuman dari database
            $PengumumanModels->delete($id);

            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Data tidak ditemukan');
        }

        return redirect()->to(base_url('admin/pengumuman/index'));
    }
}
