<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\BaseController;
use App\Models\TentangModel;


class Loginctrl extends BaseController
{
    public function index()
    {
        // Pengecekan jika pengguna sudah login
        if (session()->get('logged_in')) {
            return redirect()->to(base_url('admin/dashboard')); // Ubah 'vw_home' sesuai dengan halaman yang diinginkan setelah login
        }

        // Proses login jika pengguna belum login
        return view('admin/login/vw_login');
    }

    public function process()
    {
        $users = new TentangModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'username' => $username,
        ])->first();
        if ($dataUser) {
            if ($password === $dataUser->password) {
                session()->set([
                    'username' => $dataUser->username,
                    'nama_tentang' => $dataUser->nama_tentang,
                    'deskripsi_tentang' => $dataUser->deskripsi_tentang,
                    'foto_tentang' => $dataUser->foto_tentang,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('admin/dashboard'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('admin');
    }
}
