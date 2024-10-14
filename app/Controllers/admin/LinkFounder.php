<?php

namespace App\Controllers\admin;

use App\Models\LinkFounderModels;
use App\Models\FounderModels;
use App\Controllers\BaseController;


class LinkFounder extends BaseController
{
    public function index()
    {
        $linkFounder_model = new LinkFounderModels();
        $founder_model = new FounderModels();

        $linkFounders = $linkFounder_model->getAllLinksWithCategory();
        $founders = $founder_model->findAll();

        return view('admin/link_founder/index', [
            'linkFounders' => $linkFounders,
            'founders' => $founders
        ]);
    }

    public function tambah()
    {
        $founder_model = new FounderModels();
        $founders = $founder_model->findAll();

        return view('admin/link_founder/tambah', [
            'founders' => $founders
        ]);
    }

    public function proses_tambah()
{
    $linkFounder_model = new LinkFounderModels();
    
    // Ambil file ikon dari form
    $iconFile = $this->request->getFile('icon_link_founder');
    $iconName = '';

    if ($iconFile && $iconFile->isValid() && !$iconFile->hasMoved()) {
        // Beri nama file yang unik dan simpan di folder 'uploads/icons'
        $iconName = $iconFile->getRandomName();
        $iconFile->move('uploads/icons/', $iconName);
    }

    // Siapkan data yang akan disimpan ke database
    $data = [
        'nama_link_founder' => $this->request->getVar('nama_link_founder'),
        'icon_link_founder' => $iconName,  // Simpan nama file ikon
        'link_founder' => $this->request->getVar('link_founder'),
        'id_founder' => $this->request->getVar('id_founder'),
    ];

    // Simpan data ke database
    $linkFounder_model->save($data);
    
    // Set flashdata untuk notifikasi sukses
    session()->setFlashdata('success', 'Data berhasil disimpan');
    return redirect()->to(base_url('admin/link_founder/index'));
}


    public function edit($id_link_founder)
    {
        $linkFounder_model = new LinkFounderModels();
        $linkFounder = $linkFounder_model->find($id_link_founder);

        $founder_model = new FounderModels();
        $founders = $founder_model->findAll();

        return view('admin/link_founder/edit', [
            'linkFounder' => $linkFounder,
            'founders' => $founders
        ]);
    }

    public function proses_edit($id_link_founder)
    {
        $linkFounder_model = new LinkFounderModels();
        $data = [
            'nama_link_founder' => $this->request->getVar('nama_link_founder'),
            'icon_link_founder' => $this->request->getVar('icon_link_founder'),
            'link_founder' => $this->request->getVar('link_founder'),
            'id_founder' => $this->request->getVar('id_founder'),
        ];

        $linkFounder_model->update($id_link_founder, $data);
        session()->setFlashdata('success', 'Data berhasil diperbarui');
        return redirect()->to(base_url('admin/link_founder/index'));
    }

    public function delete($id_link_founder)
    {
        $linkFounder_model = new LinkFounderModels();
        $linkFounder_model->delete($id_link_founder);

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('admin/link_founder/index'));
    }
}