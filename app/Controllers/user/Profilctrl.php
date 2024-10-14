<?php

namespace App\Controllers\user;

use App\Models\MemberModels;
use App\Models\DPDModels;

class Profilctrl extends BaseController
{
    public function edit()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Redirect ke halaman login jika belum login
        }
    
        $model = new MemberModels();
        $data['profil_pengguna'] = $model->getProfil();
        $modeldpd = new DPDModels();
        $data['dpd'] = $modeldpd->findAll();
    
        // Simpan username sebelum pembaruan
        $id_sebelum = $_SESSION['id_member'];
    
        if ($this->request->getMethod() === 'post') {
            // Validasi form
            $validationRules = [
                'nama_member' => 'required',
                'username' => "required|is_unique[tb_member.username,id_member,$id_sebelum]",
                'password' => 'required',
            ];

            $validationMessages = [
                'username' => [
                    'is_unique' => 'Username sudah terpakai. Silakan pilih username lain.'
                ]
            ];

            if (!$this->validate($validationRules, $validationMessages)) {
                // Jika validasi gagal, kembalikan dengan pesan kesalahan
                return view('user/profil/edit', ['validation' => $this->validator, 'profil_pengguna' => $data['profil_pengguna'], 'dpd' => $data['dpd']]);
            }
            
            $dataUpdate = [
                'nama_member' => $this->request->getPost('nama_member'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'alamat_member' => $this->request->getPost('alamat_member'),
                'no_hp_member' => $this->request->getPost('no_hp_member'),
                'ig_member' => $this->request->getPost('ig_member'),
                'fb_member' => $this->request->getPost('fb_member'),
                'pendidikan_member' => $this->request->getPost('pendidikan_member'),
                'pekerjaan_member' => $this->request->getPost('pekerjaan_member'),
                'sertifikasi_member' => $this->request->getPost('sertifikasi_member'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'slug' => url_title($this->request->getPost('nama_member'), '-', TRUE)
            ];
            
           $fileFields = ['foto_member', 'cv_member'];
            foreach ($fileFields as $field) {
                $file = $this->request->getFile($field);
                
                // Periksa apakah file valid dan diunggah
                if ($file && $file->isValid()) {
                    $oldFile = $model->find($_SESSION['id_member'])->$field;
            
                    if ($oldFile && file_exists('assets-baru/img/' . $oldFile)) {
                        unlink('assets-baru/img/' . $oldFile);
                    }
            
                    $currentDateTime = date('dmYHis');
                    $nama_perusahaan = $dataUpdate['nama_member'];
                    $nama_perusahaan = str_replace(' ', '-', $nama_perusahaan);
            
                    // Tentukan nama file baru
                    $newFileName = "{$field}_{$nama_perusahaan}_{$currentDateTime}.{$file->getExtension()}";
            
                    // Pindahkan file yang diunggah ke direktori yang tepat
                    $file->move('assets-baru/img/', $newFileName);
            
                    // Set data model ke nama file baru
                    $dataUpdate[$field] = $newFileName;
                }
            }
    
            $model->where('id_member', $id_sebelum);
            $model->set($dataUpdate);
            $model->update();
            
            return redirect()->to(base_url('profil'));
        }
        
        return view('user/profil/edit', $data);
    }
}
