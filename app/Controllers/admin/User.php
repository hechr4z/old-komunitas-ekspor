<?php

namespace App\Controllers\admin;

use App\Models\MemberModels;

class User extends BaseController
{
    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
            // Ubah 'login' sesuai dengan halaman login Anda
        }

        // Periksa peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            // Jika peran bukan admin, arahkan ke halaman lain (misal: user)
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }

        $user_model = new MemberModels();
        $all_data_user = $user_model->where('role', 'admin')->findAll();
        $validation = \Config\Services::validation();
        return view('admin/user/index', [
            'all_data_user' => $all_data_user,
            'validation' => $validation
        ]);
    }

    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
            // Ubah 'login' sesuai dengan halaman login Anda
        }

        // Periksa peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            // Jika peran bukan admin, arahkan ke halaman lain (misal: user)
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }

        $user_model = new MemberModels();
        $all_data_user = $user_model->findAll();
        $validation = \Config\Services::validation();
        return view('admin/user/tambah', [
            'all_data_user' => $all_data_user,
            'validation' => $validation
        ]);
    }

    public function proses_tambah()
    {
        $userModel = new MemberModels();
        $data = [
            'nama_member' => $this->request->getVar("nama_user"),
            'username' => $this->request->getVar("username"),
            'role' => 'admin',
            'password' => $this->request->getVar("password"),
            'slug' => url_title($this->request->getPost('nama_member'), '-', TRUE)
        ];
        
        // var_dump($data);
        // die;
        $userModel->save($data);

        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/user/index'));
    }

    public function edit($id_user)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
            // Ubah 'login' sesuai dengan halaman login Anda
        }

        // Periksa peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            // Jika peran bukan admin, arahkan ke halaman lain (misal: user)
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }

        $user_model = new MemberModels();
        $userData = $user_model->find($id_user);
        $validation = \Config\Services::validation();

        return view('admin/user/edit', [
            'userData' => $userData,
            'validation' => $validation
        ]);
    }

    // Penulis.php (Controller)
    public function proses_edit($id_user = null)
    {
        if (!$id_user) {
            return redirect()->back();
        }

        $userModel = new MemberModels();
        $userData = $userModel->find($id_user);

        // Check if new 'foto_penulis' file is uploaded

        // If no new 'foto_penulis' file is uploaded, update only the other fields
        $data = [
            'nama_member' => $this->request->getVar("nama_user"),
            'username' => $this->request->getVar("username"),
            'password' => $this->request->getVar("password"),
            'slug' => url_title($this->request->getPost('nama_member'), '-', TRUE)
        ];
        
        // var_dump($data);
        // die;
        // Update data pengguna
        $userModel->where('id_member', $id_user)->set($data)->update();

        session()->setFlashdata('success', 'Berkas berhasil diperbarui');
        return redirect()->to(base_url('admin/user/index'));
    }




    public function delete($id = false)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
            // Ubah 'login' sesuai dengan halaman login Anda
        }

        // Periksa peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            // Jika peran bukan admin, arahkan ke halaman lain (misal: user)
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }

        $userModel = new MemberModels();

        $data = $userModel->find($id);
        $userModel->delete($id);

        return redirect()->to(base_url('admin/user/index'));
    }
}
