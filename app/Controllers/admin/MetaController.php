<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\MetaModel;

class MetaController extends BaseController
{
    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        // Periksa peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $meta_model = new MetaModel();
        $meta = $meta_model->findAll();

        return view('admin/meta/index', [
            'meta' => $meta,
        ]);
    }

    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        // Periksa peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $meta_model = new MetaModel();
        $meta = $meta_model->findAll();

        return view('admin/meta/tambah', [
            'meta' => $meta,
        ]);
    }

    public function proses_tambah()
    {
        $meta_model = new MetaModel();
        $data = [
            'id_seo' => $this->request->getVar("id_seo"),
            'nama_halaman' => $this->request->getVar("nama_halaman"),
            'meta_title' => $this->request->getVar("meta_title"),
            'meta_description' => $this->request->getVar("meta_description"),
            'canonical_url' => $this->request->getVar("canonical_url"),
        ];
        $meta_model->save($data);

        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/meta/index'));
    }

    public function edit($id_seo)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        // Periksa peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $meta_model = new MetaModel();
        $meta_data = $meta_model->find($id_seo);


        return view('admin/meta/edit', [
            'meta_data' => $meta_data
        ]);
    }

    public function proses_edit($id_seo = null)
    {
        if (!$id_seo) {
            return redirect()->back();
        }

        $metaModel = new MetaModel();
        $metaModel->where('id_seo', $id_seo)->set([
            'nama_halaman' => $this->request->getVar("nama_halaman"),
            'meta_title' => $this->request->getVar("meta_title"),
            'meta_description' => $this->request->getVar("meta_description"),
            'canonical_url' => $this->request->getVar("canonical_url"),
        ])->update();

        session()->setFlashdata('success', 'Berkas berhasil diperbarui');
        return redirect()->to(base_url('admin/meta/index'));
    }

    public function delete($id = null)
    {
        // Check if the user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        // Check the user's role
        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'))->with('error', 'You do not have permission to perform this action.');
        }

        // Ensure an ID is provided
        if ($id === null) {
            return redirect()->to(base_url('admin/meta/index'))->with('error', 'Invalid ID.');
        }

        $metaModel = new MetaModel();

        // Find the record to ensure it exists before attempting to delete
        $meta = $metaModel->find($id);
        if (!$meta) {
            return redirect()->to(base_url('admin/meta/index'))->with('error', 'Meta data not found.');
        }

        // Perform the deletion
        $metaModel->delete($id);

        // Redirect with a success message
        return redirect()->to(base_url('admin/meta/index'))->with('success', 'Meta data deleted successfully.');
    }
}
