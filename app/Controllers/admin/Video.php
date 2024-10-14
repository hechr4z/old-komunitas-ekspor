<?php

namespace App\Controllers\admin;

use App\Models\VideoPembelajaranModels;
use App\Models\KategoriVideoModels;
use App\Controllers\BaseController;

class Video extends BaseController
{
    public function index()
    {
        $video_model = new VideoPembelajaranModels();
        $kategori_model = new KategoriVideoModels();
        $video_model->save($this->request->getPost());


        $videos = $video_model->getAllVideosWithCategory();
        $kategori = $kategori_model->findAll();

        return view('admin/video_pembelajaran/index', [
            'videos' => $videos,
            'kategori' => $kategori


        ]);
    }

    public function tambah()
    {
        $kategori_model = new KategoriVideoModels();
        $kategori = $kategori_model->findAll();

        return view('admin/video_pembelajaran/tambah', [
            'kategori' => $kategori

        ]);
    }

    public function proses_tambah()
    {
        $video_model = new VideoPembelajaranModels();
        // Buat slug otomatis dari judul dan tambahkan tanggal ddmmyyyy
        $judul = $this->request->getVar('judul_video');
        $tanggal = date('dmY'); // Format tanggal ddmmyyyy
        $slug = url_title($judul, '-', true) . '-' . $tanggal; // Menghasilkan slug + tanggal

        $data = [
            'judul_video' => $this->request->getVar('judul_video'),
            'video_url' => $this->request->getVar('video_url'),
            'deskripsi_video' => $this->request->getVar('deskripsi_video'),
            'judul_video' => $this->request->getVar('judul_video'),
            'video_url' => $this->request->getVar('video_url'),
            'id_katvideo' => $this->request->getVar('id_katvideo'),
            'slug' => $slug
        ];

        if ($this->request->getFile('thumbnail')->isValid()) {
            $thumbnail = $this->request->getFile('thumbnail');
            $thumbnail->move('uploads/thumbnails');
            $data['thumbnail'] = $thumbnail->getName();
        }

        $video_model->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/video_pembelajaran/index'));
    }

    public function edit($id_video)
    {
        $video_model = new VideoPembelajaranModels();
        $video = $video_model->find($id_video);

        $kategori_model = new KategoriVideoModels();
        $kategori = $kategori_model->findAll();

        return view('admin/video_pembelajaran/edit', [
            'video' => $video,
            'kategori' => $kategori
        ]);
    }

    public function proses_edit($id_video)
    {
        $video_model = new VideoPembelajaranModels();

        // Buat slug otomatis dari judul dan tambahkan tanggal ddmmyyyy
        $judul = $this->request->getVar('judul_video');
        $tanggal = date('dmY'); // Format tanggal ddmmyyyy
        $slug = url_title($judul, '-', true) . '-' . $tanggal; // Menghasilkan slug + tanggal

        $data = [
            'judul_video' => $this->request->getVar('judul_video'),
            'video_url' => $this->request->getVar('video_url'),
            'deskripsi_video' => $this->request->getVar('deskripsi_video'),
            'id_katvideo' => $this->request->getVar('id_katvideo'),
            'slug' => $slug
        ];

        if ($this->request->getFile('thumbnail')->isValid()) {
            $thumbnail = $this->request->getFile('thumbnail');
            $thumbnail->move('uploads/thumbnails');
            $data['thumbnail'] = $thumbnail->getName();
        } else {
            $data['thumbnail'] = $this->request->getVar('old_thumbnail');
        }

        $video_model->update($id_video, $data);
        session()->setFlashdata('success', 'Data berhasil diperbarui');
        return redirect()->to(base_url('admin/video_pembelajaran/index'));
    }

    public function delete($id_video)
    {
        $video_model = new VideoPembelajaranModels();
        $video = $video_model->find($id_video);

        $kategori_model = new KategoriVideoModels();
        $kategori = $kategori_model->findAll();
        $video_model->delete($id_video);

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('admin/video_pembelajaran/index'));
    }
}
