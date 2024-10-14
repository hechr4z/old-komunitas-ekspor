<?php

namespace App\Controllers\admin;

use App\Models\TestimonialModels;
use App\Controllers\BaseController;

class TestimonialController extends BaseController
{
    public function index()
    {
        // Pengecekan apakah pengguna sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $testimonial_model = new TestimonialModels();
        $testimonial = $testimonial_model->findAll();

        return view('admin/testimonial/index', [
            'testimonial' => $testimonial
        ]);
    }

    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        return view('admin/testimonial/tambah');
    }

    public function proses_tambah()
    {
        // Validasi input
        if (!$this->validate([
            'foto_testimonial' => [
                'rules' => 'uploaded[foto_testimonial]|is_image[foto_testimonial]|max_dims[foto_testimonial,3000,3000]|mime_in[foto_testimonial,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih icon terlebih dahulu',
                    'is_image' => 'File yang Anda pilih bukan gambar',
                    'max_dims' => 'Maksimal ukuran gambar 3000x3000 pixels',
                    'mime_in' => 'File yang Anda pilih wajib berekstensikan jpg/jpeg/png'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $file_icon = $this->request->getFile('foto_testimonial');
        $file_icon->move('uploads/testimonial/');
        $icon_name = $file_icon->getName();

        $testimonial_model = new TestimonialModels();
        $data = [
            'nama_member' => $this->request->getVar('nama_member'),
            'jabatan_testimonial' => $this->request->getVar('jabatan_testimonial'),
            'deskripsi_testimonial' => $this->request->getVar('deskripsi_testimonial'),
            'foto_testimonial' => $icon_name
        ];
        $testimonial_model->save($data);

        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/testimonial/index'));
    }

    public function edit($id_testimonial)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $role = session()->get('role');
        if ($role !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $testimonial_model = new TestimonialModels();
        $testimonial = $testimonial_model->find($id_testimonial);

        if (!$testimonial) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Testimonial tidak ditemukan');
        }

        return view('admin/testimonial/edit', [
            'testimonial' => $testimonial
        ]);
    }

    public function proses_edit($id_testimonial = null)
    {
        if (!$id_testimonial) {
            return redirect()->back();
        }

        $testimonial_model = new TestimonialModels();
        $testimonial = $testimonial_model->find($id_testimonial);

        $file_icon = $this->request->getFile('foto_testimonial');

        if ($file_icon && $file_icon->isValid() && !$file_icon->hasMoved()) {
            // Hapus file lama jika ada
            if (file_exists('uploads/testimonial/' . $testimonial['foto_testimonial'])) {
                unlink('uploads/testimonial/' . $testimonial['foto_testimonial']);
            }

            // Pindahkan file baru ke folder uploads
            $newIconName = $file_icon->getRandomName();
            $file_icon->move('uploads/testimonial/', $newIconName);

            // Simpan nama file baru di database
            $testimonial_model->update($id_testimonial, [
                'foto_testimonial' => $newIconName,
                'nama_member' => $this->request->getVar('nama_member'),
                'jabatan_testimonial' => $this->request->getVar('jabatan_testimonial'),
                'deskripsi_testimonial' => $this->request->getVar('deskripsi_testimonial'),
            ]);
        } else {
            // Jika tidak ada file baru, hanya update data lainnya
            $testimonial_model->update($id_testimonial, [
                'nama_member' => $this->request->getVar('nama_member'),
                'jabatan_testimonial' => $this->request->getVar('jabatan_testimonial'),
                'deskripsi_testimonial' => $this->request->getVar('deskripsi_testimonial'),
            ]);
        }

        session()->setFlashdata('success', 'Data berhasil diperbarui');
        return redirect()->to(base_url('admin/keuntungan/index'));
    }

    public function delete($id_testimonial)
    {
        // Pengecekan otentikasi dan hak akses
        if (!session()->get('logged_in') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('/'));
        }

        $testimonial_model = new TestimonialModels();
        $testimonial = $testimonial_model->find($id_testimonial);

        // Hapus file icon jika ada
        if ($testimonial && !empty($testimonial['foto_testimonial'])) {
            $filePath = 'uploads/testimonial/' . $testimonial['foto_testimonial'];

            if (is_file($filePath)) {
                unlink($filePath); // Hapus file icon
            }
        }

        $testimonial_model->delete($id_testimonial); // Hapus data dari database

        session()->setFlashdata('success', 'Testimonial berhasil dihapus');
        return redirect()->to(base_url('admin/testimonial/index'));
    }
}
