<?php

namespace App\Controllers\admin;

use App\Models\MemberModel;
use App\Models\ProvinsiModels;
use App\Models\KabkotaModel;
use App\Controllers\BaseController;
use App\Models\KabkotaModels;
use App\Models\MemberModels;

class Member extends BaseController
{
    public function index()
    {
        $member_model = new MemberModels();
        $members = $member_model->getAllMembersWithLocation();
        
        return view('admin/member/index', [
            'members' => $members
        ]);
    }

    public function tambah()
    {
        $provinsi_model = new ProvinsiModels();
        $kabkota_model = new KabkotaModels();

        $provinsi = $provinsi_model->findAll();
        $kabkota = $kabkota_model->findAll();

        return view('admin/member/tambah', [
            'provinsi' => $provinsi,
            'kabkota' => $kabkota
        ]);
    }

    public function proses_tambah()
{
    $member_model = new MemberModels();
    $id_provinsi = $this->request->getVar('id_provinsi');

    if (empty($id_provinsi)) {
        // Debugging jika provinsi tidak ada
        die('Provinsi tidak dipilih atau tidak diterima oleh server.');
    }
    
    // Ambil file foto dari form
    $fotoFile = $this->request->getFile('foto_member');
    $fotoName = '';

    if ($fotoFile && $fotoFile->isValid() && !$fotoFile->hasMoved()) {
        $fotoName = $fotoFile->getRandomName();
        $fotoFile->move('uploads/photos/', $fotoName);
    }

    // Ambil file CV dari form
    $cvFile = $this->request->getFile('cv_member');
    $cvName = '';

    if ($cvFile && $cvFile->isValid() && !$cvFile->hasMoved()) {
        $cvName = $cvFile->getRandomName();
        $cvFile->move('uploads/cv/', $cvName);
    }

    $data = [
        'username' => $this->request->getVar('username'),
        'password' => $this->request->getVar('password'),
        'nama_member' => $this->request->getVar('nama_member'),
        'id_provinsi' => $this->request->getVar('id_provinsi'),
        'id_kabkota' => $this->request->getVar('id_kabkota'),
        'status_kepengurusan' => $this->request->getVar('status_kepengurusan'),
        'alamat_member' => $this->request->getVar('alamat_member'),
        'no_hp_member' => $this->request->getVar('no_hp_member'),
        'email_member' => $this->request->getVar('email_member'),
        'ig_member' => $this->request->getVar('ig_member'),
        'fb_member' => $this->request->getVar('fb_member'),
        'pendidikan_member' => $this->request->getVar('pendidikan_member'),
        'pekerjaan_member' => $this->request->getVar('pekerjaan_member'),
        'sertifikasi_member' => $this->request->getVar('sertifikasi_member'),
        'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
        'foto_member' => $fotoName,
        'cv_member' => $cvName  // Simpan nama file CV
    ];

    $member_model->save($data);
    
    session()->setFlashdata('success', 'Data berhasil disimpan');
    return redirect()->to(base_url('admin/member/index'));
}



public function edit($id_member)
{
    $member_model = new MemberModels();
    $provinsi_model = new ProvinsiModels();
    $kabkota_model = new KabkotaModels();

    // Ambil data member, provinsi, dan kabkota
    $member = $member_model->find($id_member);
    $provinsi = $provinsi_model->findAll();
    $kabkota = $kabkota_model->findAll();

    return view('admin/member/edit', [
        'member' => $member,
        'provinsi' => $provinsi,  // Tambahkan provinsi
        'kabkota' => $kabkota     // Tambahkan kabkota
    ]);
}

public function proses_edit($id_member)
{
    $member_model = new MemberModels();
    
    // Ambil file foto dari form jika ada
    $photoFile = $this->request->getFile('foto_member');
    $photoName = $this->request->getVar('current_foto_member'); // Nama file foto yang sudah ada

    if ($photoFile && $photoFile->isValid() && !$photoFile->hasMoved()) {
        // Beri nama file yang unik dan simpan di folder 'uploads/photos'
        $photoName = $photoFile->getRandomName();
        $photoFile->move('uploads/photos/', $photoName);
    }

    // Siapkan data yang akan disimpan ke database
    $data = [
        'username' => $this->request->getVar('username'),  // Pastikan username disertakan
        'nama_member' => $this->request->getVar('nama_member'),
        'id_provinsi' => $this->request->getVar('id_provinsi'),
        'id_kabkota' => $this->request->getVar('id_kabkota'),
        'ig_member' => $this->request->getVar('ig_member'),
        'fb_member' => $this->request->getVar('fb_member'),
        'pendidikan_member' => $this->request->getVar('pendidikan_member'),
        'pekerjaan_member' => $this->request->getVar('pekerjaan_member'),
        'sertifikasi_member' => $this->request->getVar('sertifikasi_member'),
        'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
        'foto_member' => $photoName,  // Simpan nama file foto
    ];

    $member_model->update($id_member, $data);
    session()->setFlashdata('success', 'Data berhasil diperbarui');
    return redirect()->to(base_url('admin/member/index'));
}


    public function delete($id_member)
    {
        $member_model = new MemberModels();
        $member = $member_model->find($id_member);

        // Hapus file foto jika ada
        if ($member && $member->foto_member) {
            $filePath = WRITEPATH . 'uploads/photos/' . $member->foto_member;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $member_model->delete($id_member);

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('admin/member/index'));
    }

    public function someMethod()
{
    $provinsiModel = new ProvinsiModels();  // Assuming you have a ProvinceModel
    $provinsi = $provinsiModel->findAll();

    return view('some_view', [
        'provinsi' => $provinsi,
        // Other data as needed
    ]);
}
}
