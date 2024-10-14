<?php

namespace App\Controllers\admin;

use App\Models\BeritaModels;

class Berita extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $berita_model = new BeritaModels();
        $all_data_berita = $berita_model->findAll();
        $validation = \Config\Services::validation();

        return view('admin/berita/index', [
            'all_data_berita' => $all_data_berita,
            'validation' => $validation
        ]);
    }

    public function tambah()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $validation = \Config\Services::validation();

        return view('admin/berita/tambah', [
            'validation' => $validation
        ]);
    }

    public function proses_tambah()
    {
        if (!$this->validate([
            'poster_berita' => [
                'rules' => 'uploaded[poster_berita]|is_image[poster_berita]|max_dims[poster_berita,3000,3000]|mime_in[poster_berita,image/jpg,image/jpeg,image/png]',
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
            $judul = $this->request->getVar('judul_berita');
            $tanggal = date('dmY'); // Format tanggal ddmmyyyy
            $slug = url_title($judul, '-', true) . '-' . $tanggal; // Menghasilkan slug + tanggal

            $file_foto = $this->request->getFile('poster_berita');

            // Pastikan file valid dan belum dipindahkan
            if ($file_foto && $file_foto->isValid() && !$file_foto->hasMoved()) {
                // Buat nama file dengan format slug
                $file_name = $slug . '.' . $file_foto->getClientExtension();

                // Pindahkan file ke direktori uploads/foto_berita
                $file_foto->move('uploads/foto_berita', $file_name);

                // Simpan data ke model
                $berita_model = new BeritaModels();
                $data = [
                    'judul_berita' => $this->request->getVar("judul_berita"),
                    'deskripsi_berita' => $this->request->getVar("deskripsi_berita"),
                    'mulai_berita' => $this->request->getVar("mulai_berita"),
                    'akhir_berita' => $this->request->getVar("akhir_berita"),
                    'poster_berita' => $file_name,
                    'slug' => $slug,
                ];

                $berita_model->save($data);

                session()->setFlashdata('success', 'Data berhasil disimpan');
                return redirect()->to(base_url('admin/berita/index'));
            } else {
                session()->setFlashdata('error', 'Terjadi kesalahan dalam upload file.');
                return redirect()->back()->withInput();
            }
        }
    }


    public function edit($id_berita)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $berita_model = new BeritaModels();
        $beritaData = $berita_model->find($id_berita);
        $validation = \Config\Services::validation();

        return view('admin/berita/edit', [
            'beritaData' => $beritaData,
            'validation' => $validation
        ]);
    }

    public function proses_edit($id_berita = null)
    {
        if (!$id_berita) {
            return redirect()->back();
        }

        $berita_model = new BeritaModels();
        $beritaData = $berita_model->find($id_berita);

        // Buat slug otomatis dari judul dan tambahkan tanggal ddmmyyyy
        $judul = $this->request->getVar('judul_berita');
        $tanggal = date('dmY'); // Format tanggal ddmmyyyy
        $slug = url_title($judul, '-', true) . '-' . $tanggal; // Menghasilkan slug + tanggal

        if ($this->request->getFile('poster_berita')->isValid()) {
            // Hapus file lama jika ada
            $oldFilePath = 'uploads/foto_berita/' . $beritaData->poster_berita;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            // Proses upload file baru
            $file_foto = $this->request->getFile('poster_berita');
            $file_name = $slug . '.' . $file_foto->getClientExtension(); // Nama file dengan format slug
            $file_foto->move('uploads/foto_berita', $file_name);

            // Update data termasuk nama file baru
            $data = [
                'poster_berita' => $file_name,
                'judul_berita' => $this->request->getVar("judul_berita"),
                'deskripsi_berita' => $this->request->getVar("deskripsi_berita"),
                'mulai_berita' => $this->request->getVar("mulai_berita"),
                'akhir_berita' => $this->request->getVar("akhir_berita"),
                'slug' => $slug,
            ];
        } else {
            // Update data tanpa mengubah file gambar
            $data = [
                'judul_berita' => $this->request->getVar("judul_berita"),
                'deskripsi_berita' => $this->request->getVar("deskripsi_berita"),
                'mulai_berita' => $this->request->getVar("mulai_berita"),
                'akhir_berita' => $this->request->getVar("akhir_berita"),
                'slug' => $slug,
            ];
        }

        // Update data di database
        $berita_model->update($id_berita, $data);

        session()->setFlashdata('success', 'Berkas berhasil diperbarui');
        return redirect()->to(base_url('admin/berita/index'));
    }


    public function delete($id = false)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $berita_model = new BeritaModels();

        // Cari data berita berdasarkan ID
        $data = $berita_model->find($id);

        if ($data) {
            // Hapus file gambar jika ada
            $filePath = 'uploads/foto_berita/' . $data->poster_berita;
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Hapus data berita dari database
            $berita_model->delete($id);

            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Data tidak ditemukan');
        }

        return redirect()->to(base_url('admin/berita/index'));
    }
}
