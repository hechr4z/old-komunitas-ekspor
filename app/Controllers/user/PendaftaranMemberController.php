<?php

namespace App\Controllers\User;

use App\Controllers\NewUser\BaseController;
use App\Models\PendaftaranMemberModels;
use App\Models\KabkotaModels;
use App\Models\MetaModel;
use App\Models\ProvinsiModels;

class PendaftaranMemberController extends BaseController
{
    protected $pendaftaranMemberModel;
    protected $kabkotaModel;
    protected $provinsiModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->pendaftaranMemberModel = new PendaftaranMemberModels();
        $this->kabkotaModel = new KabkotaModels();
        $this->provinsiModel = new ProvinsiModels();
    }

    public function pendaftaran_member()
    {
        // Ambil data provinsi dan kabupaten/kota dari model
        $provinsi = $this->provinsiModel->findAll();
        $kabkota = $this->kabkotaModel->findAll();

        //SEO
        $metaModel = new MetaModel();
        $meta = $metaModel->where('nama_halaman', 'Pendaftaran Member')->first();
        
        $canonicalUrl = base_url('pendaftaran_member');

        return $this->render('NewUser/beranda/pendaftaran_member', [
            'title' => 'Pendaftaran Member',
            'provinsi' => $provinsi,   // Kirim data provinsi ke view
            'kabkota' => $kabkota,      // Kirim data kabupaten/kota ke view
            'meta' => $meta,
            'canonicalUrl' => $canonicalUrl,
        ]);
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nama_member' => 'required|string',
            'no_hp_member' => 'required|string',
            'email_member' => 'required|valid_email',
            'alamat_member' => 'required|string',
            'id_provinsi' => 'required|integer',
            'id_kabkota' => 'required|integer',
            'pekerjaan_member' => 'required|string',
            'pendidikan_member' => 'required|string',
            'jenis_kelamin' => 'required|in_list[L,P]',
            'username' => 'required|string',
            'password' => 'required',
            'foto_member' => 'uploaded[foto_member]|max_size[foto_member,2048]|is_image[foto_member]',
            'cv_member' => 'uploaded[cv_member]|max_size[cv_member,2048]|mime_in[cv_member,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document]',
            'sertifikasi_member' => 'permit_empty|mime_in[sertifikasi_member,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil file dari request
        $fotoMember = $this->request->getFile('foto_member');
        $cvMember = $this->request->getFile('cv_member');
        $sertifikasiMember = $this->request->getFile('sertifikasi_member');

        // Debugging: Cek error upload file
        if ($fotoMember->getError() !== UPLOAD_ERR_OK) {
            log_message('error', 'Upload error for foto_member: ' . $fotoMember->getErrorString());
            return redirect()->back()->withInput()->with('errors', ['foto_member' => 'File upload error: ' . $fotoMember->getErrorString()]);
        }

        if ($cvMember->getError() !== UPLOAD_ERR_OK) {
            log_message('error', 'Upload error for cv_member: ' . $cvMember->getErrorString());
            return redirect()->back()->withInput()->with('errors', ['cv_member' => 'File upload error: ' . $cvMember->getErrorString()]);
        }

        if ($sertifikasiMember->getError() !== UPLOAD_ERR_OK) {
            log_message('error', 'Upload error for sertifikasi_member: ' . $sertifikasiMember->getErrorString());
            return redirect()->back()->withInput()->with('errors', ['sertifikasi_member' => 'File upload error: ' . $sertifikasiMember->getErrorString()]);
        }

        // Cek dan pindahkan file jika valid
        $fotoMemberName = null;
        if ($fotoMember->isValid()) {
            $fotoMemberName = $fotoMember->getRandomName();
            $fotoMember->move(WRITEPATH . 'uploads/member/foto', $fotoMemberName);
        }

        $cvMemberName = null;
        if ($cvMember->isValid()) {
            $cvMemberName = $cvMember->getRandomName();
            $cvMember->move(WRITEPATH . 'uploads/member/cv', $cvMemberName);
        }

        $sertifikasiMemberName = null;
        if ($sertifikasiMember->isValid()) {
            $sertifikasiMemberName = $sertifikasiMember->getRandomName();
            $sertifikasiMember->move(WRITEPATH . 'uploads/member/sertifikasi', $sertifikasiMemberName);
        }

        // $password = $this->request->getPost('password');
        //var_dump($password); die();
        // $password_hashed = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        //    / var_dump($password_hash);die();

        // Data yang akan disimpan ke database
        $data = [
            'nama_member' => $this->request->getPost('nama_member'),
            'no_hp_member' => $this->request->getPost('no_hp_member'),
            'email_member' => $this->request->getPost('email_member'),
            'alamat_member' => $this->request->getPost('alamat_member'),
            'id_provinsi' => $this->request->getPost('id_provinsi'),
            'id_kabkota' => $this->request->getPost('id_kabkota'),
            'pekerjaan_member' => $this->request->getPost('pekerjaan_member'),
            'pendidikan_member' => $this->request->getPost('pendidikan_member'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'foto_member' => $fotoMemberName,
            'cv_member' => $cvMemberName,
            'sertifikasi_member' => $sertifikasiMemberName,
            'slug' => $this->request->getPost('slug'),
            'ig_member' => $this->request->getPost('ig_member'),
            'fb_member' => $this->request->getPost('fb_member'),
        ];

        //    / var_dump($data); die();

        // Simpan data ke database
        if (!$this->pendaftaranMemberModel->save($data)) {
            log_message('error', 'Failed to save member data: ' . print_r($this->pendaftaranMemberModel->errors(), true));
            return redirect()->back()->withInput()->with('errors', ['general' => 'Failed to save member data.']);
        }

        return redirect()->to('/pendaftaran_member');
    }
}
