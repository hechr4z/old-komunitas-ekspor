<?php

namespace App\Controllers\admin;

use App\Models\FounderModels;


class Founder extends BaseController
{
    public function index()
{
    // Pengecekan apakah pengguna sudah login atau belum
    if (!session()->get('logged_in')) {
        return redirect()->to(base_url('login'));
    }

    $role = session()->get('role');
    if ($role !== 'admin') {
        return redirect()->to(base_url('/'));
    }

    $founder_model = new FounderModels();
    $founders = $founder_model->findAll(); // Pastikan Anda mendapatkan semua data founder

    return view('admin/founder/index', [
        'founders' => $founders // Kirimkan data founder ke view
    ]);
}

    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        return view('admin/founder/tambah');
    }

    public function proses_tambah()
    {
        if (!$this->validate([
            'foto_founder' => [
                'rules' => 'uploaded[foto_founder]|is_image[foto_founder]|max_dims[foto_founder,3000,3000]|mime_in[foto_founder,image/jpg,image/jpeg,image/png]',
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
            $file_foto = $this->request->getFile('foto_founder');
            $file_foto->move('uploads/foto_founder/');
            $file_name = $file_foto->getName();
            $founder_model = new FounderModels();
            $data = [
                'nama_founder' => $this->request->getVar("nama_founder"),
                'jabatan_founder' => $this->request->getVar("jabatan_founder"),
                'deskripsi_founder' => $this->request->getVar("deskripsi_founder"),
                'foto_founder' => $file_name
            ];
            $founder_model->save($data);

            session()->setFlashdata('success', 'Data berhasil disimpan');
            return redirect()->to(base_url('admin/founder/index'));
        }
    }

    public function edit($id_founder)
{
    if (!session()->get('logged_in')) {
        return redirect()->to(base_url('login'));
    }

    $role = session()->get('role');
    if ($role !== 'admin') {
        return redirect()->to(base_url('/'));
    }

    $founder_model = new FounderModels();
    $founder = $founder_model->find($id_founder);  // Ambil data founder berdasarkan ID

    // Pastikan data founder ditemukan
    if (!$founder) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Founder tidak ditemukan');
    }

    return view('admin/founder/edit', [
        'founder' => $founder // Kirim data founder ke view
    ]);
}

public function proses_edit($id_founder = null)
{
    if (!$id_founder) {
        return redirect()->back();
    }

    $founder_model = new FounderModels();
    $founderData = $founder_model->find($id_founder);

    $file_foto = $this->request->getFile('foto_founder');

    if ($file_foto && $file_foto->isValid() && !$file_foto->hasMoved()) {
        // Hapus file lama jika ada
        if (file_exists('uploads/foto_founder/' . $founderData['foto_founder'])) {
            unlink('uploads/foto_founder/' . $founderData['foto_founder']);
        }

        // Pindahkan file baru ke folder uploads
        $newFileName = $file_foto->getRandomName();
        $file_foto->move('uploads/foto_founder/', $newFileName);

        // Simpan nama file baru di database
        $founder_model->update($id_founder, [
            'foto_founder' => $newFileName,
            'nama_founder' => $this->request->getVar("nama_founder"),
            'jabatan_founder' => $this->request->getVar("jabatan_founder"),
            'deskripsi_founder' => $this->request->getVar("deskripsi_founder"),
        ]);
    } else {
        // Jika tidak ada file baru, hanya update data lainnya
        $founder_model->update($id_founder, [
            'nama_founder' => $this->request->getVar("nama_founder"),
            'jabatan_founder' => $this->request->getVar("jabatan_founder"),
            'deskripsi_founder' => $this->request->getVar("deskripsi_founder"),
        ]);
    }

    session()->setFlashdata('success', 'Data berhasil diperbarui');
    return redirect()->to(base_url('admin/founder/index'));
}

    public function delete($id_founder)
    {
        // Pastikan pengguna sudah login dan memiliki peran admin
        if (!session()->get('logged_in') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $founder_model = new FounderModels();
        $founder = $founder_model->find($id_founder);

        if ($founder && !empty($founder->foto_founder)) {
            $filePath = 'uploads/foto_founder/' . $founder->foto_founder;

            if (is_file($filePath)) {
                unlink($filePath); // Hapus file foto founder
            }
        }

        $founder_model->delete($id_founder); // Hapus data founder dari database

        session()->setFlashdata('success', 'Founder berhasil dihapus');
        return redirect()->to(base_url('admin/founder/index'));
    }
}
