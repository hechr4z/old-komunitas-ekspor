<?php

namespace App\Controllers\admin;

use App\Models\KontakModels;
use App\Controllers\BaseController;

class Kontak extends BaseController
{
    private $kontakModels;

    public function __construct()
    {
        $this->kontakModels = new KontakModels();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $data['kontaks'] = $this->kontakModels->findAll();
        return view('admin/kontak/index', $data);
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

        return view('admin/kontak/tambah');
    }

    public function proses_tambah()
    {
        $this->kontakModels->save($this->request->getPost());
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/kontak/index'));
    }

    public function edit($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $data['kontak'] = $this->kontakModels->find($id);
        return view('admin/kontak/edit', $data);
    }

    public function proses_edit($id)
    {
        $this->kontakModels->update($id, $this->request->getPost());
        session()->setFlashdata('success', 'Data berhasil diperbarui');
        return redirect()->to(base_url('admin/kontak/index'));
    }

    public function delete($id)
    {
        $this->kontakModels->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('admin/kontak/index'));
    }
}