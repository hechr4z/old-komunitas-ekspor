<?php

namespace App\Controllers\admin;

use App\Models\KategoriVideoModels;
use App\Controllers\BaseController;

class KategoriVideo extends BaseController
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

        $kategori_model = new KategoriVideoModels();
        $all_data_katvid = $kategori_model->findAll();

        return view('admin/kategori_videos/index', [
            'all_data_katvid' => $all_data_katvid
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

        return view('admin/kategori_videos/tambah');
    }

    public function proses_tambah()
    {
        $kategori_model = new KategoriVideoModels();

        // Buat slug otomatis dari judul dan tambahkan tanggal ddmmyyyy
        $judul = $this->request->getVar('nama_kategori_video');
        $tanggal = date('dmY'); // Format tanggal ddmmyyyy
        $slug = url_title($judul, '-', true) . '-' . $tanggal; // Menghasilkan slug + tanggal

        $data = [
            'nama_kategori_video' => $this->request->getVar("nama_kategori_video"),
            'slug' => $slug,
        ];

        if (!empty($data['nama_kategori_video'])) {
            $kategori_model->save($data);
            session()->setFlashdata('success', 'Data berhasil disimpan');
        } else {
            session()->setFlashdata('error', 'Nama kategori video harus diisi');
        }

        return redirect()->to(base_url('admin/kategori_videos/index'));
    }

    public function edit($id_katvideo)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $kategori_model = new KategoriVideoModels();
        $katvidData = $kategori_model->find($id_katvideo);

        return view('admin/kategori_videos/edit', [
            'katvidData' => $katvidData
        ]);
    }

    public function proses_edit($id_katvideo)
    {
        if (!$id_katvideo) {
            return redirect()->back();
        }

         // Buat slug otomatis dari judul dan tambahkan tanggal ddmmyyyy
         $judul = $this->request->getVar('nama_kategori_video');
         $tanggal = date('dmY'); // Format tanggal ddmmyyyy
         $slug = url_title($judul, '-', true) . '-' . $tanggal; // Menghasilkan slug + tanggal

        $kategori_model = new KategoriVideoModels();
        $data = [
            'nama_kategori_video' => $this->request->getPost("nama_kategori_video"),
            'slug' => $slug,
        ];

        $kategori_model->update($id_katvideo, $data);
        session()->setFlashdata('success', 'Data berhasil diperbarui');

        return redirect()->to(base_url('admin/kategori_videos/index'));
    }

    public function delete($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $kategori_model = new KategoriVideoModels();
        $kategori_model->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('admin/kategori_videos/index'));
    }
}
