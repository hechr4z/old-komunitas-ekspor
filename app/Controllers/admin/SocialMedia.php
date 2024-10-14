<?php

namespace App\Controllers\admin;

use App\Models\SocialMediaModels;
    use App\Controllers\BaseController;

class SocialMedia extends BaseController
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

        $socialMediaModel = new SocialMediaModels();
        $all_social_media = $socialMediaModel->findAll();

        return view('admin/socialmedia/index', [
            'all_social_media' => $all_social_media
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

        return view('admin/socialmedia/tambah');
    }

    public function proses_tambah()
    {
        $socialMediaModel = new SocialMediaModels();

        // Handle file upload
        $file = $this->request->getFile('icon_sosmed');
        $icon_sosmed = null;
        
        if ($file->isValid() && !$file->hasMoved()) {
            $icon_sosmed = $file->getRandomName();
            $file->move(FCPATH . 'uploads/socialmedia_icons', $icon_sosmed);
        }

        $data = [
            'nama_sosmed' => $this->request->getVar("nama_sosmed"),
            'link_sosmed' => $this->request->getVar("link_sosmed"),
            'icon_sosmed' => $icon_sosmed,
        ];

        if (!empty($data['nama_sosmed']) && !empty($data['link_sosmed'])) {
            $socialMediaModel->save($data);
            session()->setFlashdata('success', 'Data berhasil disimpan');
        } else {
            session()->setFlashdata('error', 'Nama dan link sosial media harus diisi');
        }

        return redirect()->to(base_url('admin/socialmedia/index'));
    }

    public function edit($id_sosmed)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $socialMediaModel = new SocialMediaModels();
        $socialMediaData = $socialMediaModel->find($id_sosmed);

        if (!$socialMediaData) {
            session()->setFlashdata('error', 'Data tidak ditemukan');
            return redirect()->to(base_url('admin/socialmedia/index'));
        }

        return view('admin/socialmedia/edit', [
            'socialMediaData' => $socialMediaData
        ]);
    }

    public function proses_edit($id_sosmed)
    {
        if (!$id_sosmed) {
            session()->setFlashdata('error', 'ID Sosmed tidak valid');
            return redirect()->back();
        }

        $socialMediaModel = new SocialMediaModels();
        $socialMediaData = $socialMediaModel->find($id_sosmed);

        if (!$socialMediaData) {
            session()->setFlashdata('error', 'Data tidak ditemukan');
            return redirect()->to(base_url('admin/socialmedia/index'));
        }

        // Handle file upload
        $file = $this->request->getFile('icon_sosmed');
        $icon_sosmed = null;

        if ($file->isValid() && !$file->hasMoved()) {
            $icon_sosmed = $file->getRandomName();
            $file->move(FCPATH . 'uploads/socialmedia_icons', $icon_sosmed);

            // Delete the old icon file if it exists
            if ($socialMediaData->icon_sosmed && file_exists(FCPATH . 'uploads/socialmedia_icons/' . $socialMediaData->icon_sosmed)) {
                unlink(FCPATH . 'uploads/socialmedia_icons/' . $socialMediaData->icon_sosmed);
            }
        }

        $data = [
            'nama_sosmed' => $this->request->getPost("nama_sosmed"),
            'link_sosmed' => $this->request->getPost("link_sosmed"),
        ];

        if ($icon_sosmed) {
            $data['icon_sosmed'] = $icon_sosmed;
        }

        $socialMediaModel->update($id_sosmed, $data);
        session()->setFlashdata('success', 'Data berhasil diperbarui');

        return redirect()->to(base_url('admin/socialmedia/index'));
    }

    public function delete($id_sosmed)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $socialMediaModel = new SocialMediaModels();
        $socialMediaData = $socialMediaModel->find($id_sosmed);

        if (!$socialMediaData) {
            session()->setFlashdata('error', 'Data tidak ditemukan');
            return redirect()->to(base_url('admin/socialmedia/index'));
        }

        // Delete the icon file if it exists
        if ($socialMediaData->icon_sosmed && file_exists(FCPATH . 'uploads/socialmedia_icons/' . $socialMediaData->icon_sosmed)) {
            unlink(FCPATH . 'uploads/socialmedia_icons/' . $socialMediaData->icon_sosmed);
        }

        $socialMediaModel->delete($id_sosmed);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('admin/socialmedia/index'));
    }
}
