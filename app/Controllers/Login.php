<?php

namespace App\Controllers;

use App\Models\MemberModels;

class Login extends BaseController
{
    public function index()
    {
        // Pengecekan jika pengguna sudah login
        if (session()->get('logged_in')) {
            // Mendapatkan role pengguna
            $role = session()->get('role');

            // Mengarahkan berdasarkan role pengguna
            if ($role === 'admin') {
                return redirect()->to(base_url('admin/dashboard'));
            } elseif ($role === 'user') {
                return redirect()->to(base_url('/pengumuman')); // Atur URL untuk halaman user
            } else {
                // Jika role tidak dikenali, arahkan ke halaman login atau error
                return redirect()->to(base_url('/login'));
            }
        }

        // Tampilkan halaman login jika pengguna belum login
        return view('admin/login/index');
    }

    public function process()
    {
        // Inisialisasi model pengguna
        $users = new MemberModels();
        
        // Ambil input dari form login
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        // Debugging password (jika perlu)
        // var_dump($password); die();
        
        // Cari pengguna berdasarkan username
        $dataUser = $users->where('username', $username)->first();  // Hasilnya berupa object

        if ($dataUser) {
            // Ambil password yang di-hash dari database
            $hashedPassword = $dataUser->password;

            // Periksa apakah password yang diinput cocok dengan password yang di-hash
            if (password_verify($password, $hashedPassword)) {
                // Jika password cocok, set session dan role
                session()->set([
                    'username'   => $dataUser->username,
                    'id_member'  => $dataUser->id_member,
                    'logged_in'  => true,
                    'role'       => $dataUser->role  // Pastikan tabel user memiliki kolom role
                ]);

                // Redirect sesuai dengan peran (role)
                if ($dataUser->role == 'admin') {
                    return redirect()->to(base_url('admin'));  // Sesuaikan dengan halaman admin
                } elseif ($dataUser->role == 'user') {
                    return redirect()->to(base_url('/pengumuman'));  // Sesuaikan dengan halaman user
                }
            } else {
                // Jika password tidak cocok
                session()->setFlashdata('error', 'Password Salah!');
                return redirect()->to(base_url('login'));
            }
        } else {
            // Jika username tidak ditemukan
            session()->setFlashdata('error', 'Username Salah!');
            return redirect()->to(base_url('login'));
        }
    }


    public function logout()
    {
        // Hapus semua data sesi dan arahkan ke halaman login
        session()->destroy();
        return redirect()->to('/login');
    }
}
