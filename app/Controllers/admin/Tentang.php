<?php

namespace App\Controllers\admin;

use App\Models\TentangModels;
use App\Controllers\BaseController;

class Tentang extends BaseController
{
    public function index()
    {
        $tentang_model = new TentangModels();
        $tentang = $tentang_model->findAll();

        return view('admin/tentang/index', [
            'tentang' => $tentang
        ]);
    }

    public function tambah()
    {
        return view('admin/tentang/tambah');
    }

    public function proses_tambah()
    {
        $tentang_model = new TentangModels();
        $data = [
            'nama_tentang'  => $this->request->getVar('nama_tentang'),
            'visi'          => $this->request->getVar('visi'),
            'misi'          => $this->request->getVar('misi'),
            'deskripsi_tentang' => $this->request->getVar('deskripsi_tentang'),
            'video_tentang' => $this->request->getVar('video_tentang'),
            'copyright'     => $this->request->getVar('copyright'),
        ];
    
        // Proses upload logo
        $logo = $this->request->getFile('logo');
        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $logo->move('uploads/gambar');
            $data['logo'] = $logo->getName();
        }
    
        // Proses upload favicon
        $favicon = $this->request->getFile('favicon');
        if ($favicon && $favicon->isValid() && !$favicon->hasMoved()) {
            $favicon->move('uploads/gambar');
            $data['favicon'] = $favicon->getName();
        }
    
        $tentang_model->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/tentang/index'));
    }

    public function edit($id_tentang)
    {
        $tentang_model = new TentangModels();
        $tentang = $tentang_model->find($id_tentang);

        return view('admin/tentang/edit', [
            'tentang' => $tentang,
        ]);
    }

    public function proses_edit($id_tentang)
    {
        $tentang_model = new TentangModels();
        $data = [
            'nama_tentang'  => $this->request->getVar('nama_tentang'),
            'visi'          => $this->request->getVar('visi'),
            'misi'          => $this->request->getVar('misi'),
            'deskripsi_tentang' => $this->request->getVar('deskripsi_tentang'),
            'video_tentang' => $this->request->getVar('video_tentang'),
            'copyright'     => $this->request->getVar('copyright'),
        ];
    
        // Proses upload logo baru jika ada
        $logo = $this->request->getFile('logo');
        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $logo->move('uploads/gambar');
            $data['logo'] = $logo->getName();
        } else {
            // Gunakan logo lama jika tidak ada yang baru diunggah
            $data['logo'] = $this->request->getVar('old_logo');
        }
    
        // Proses upload favicon baru jika ada
        $favicon = $this->request->getFile('favicon');
        if ($favicon && $favicon->isValid() && !$favicon->hasMoved()) {
            $favicon->move('uploads/gambar');
            $data['favicon'] = $favicon->getName();
        } else {
            // Gunakan favicon lama jika tidak ada yang baru diunggah
            $data['favicon'] = $this->request->getVar('old_favicon');
        }
    
        $tentang_model->update($id_tentang, $data);
        session()->setFlashdata('success', 'Data berhasil diperbarui');
        return redirect()->to(base_url('admin/tentang/index'));
    }

    public function delete($id_tentang)
    {
        $tentang_model = new TentangModels();
    
        // Pastikan item ada di database
        $item = $tentang_model->find($id_tentang);
        if (!$item) {
            session()->setFlashdata('error', 'Data tidak ditemukan');
            return redirect()->to(base_url('admin/tentang/index'));
        }
    
        // Hapus data dari database
        $tentang_model->delete($id_tentang);
        
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('admin/tentang/index'));
    }
    
    }

