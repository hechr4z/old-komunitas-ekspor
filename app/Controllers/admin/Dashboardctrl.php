<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

use App\Models\ProvinsiModels;
use App\Models\KabkotaModels;
use App\Models\MemberModels;
use App\Models\PengumumanModels;
use App\Models\KategoriVideoModels;
use App\Models\VideoPembelajaranModels;

use App\Models\KeuntunganModel;
use App\Models\KontakModels;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use App\Models\SocialMediaModels;

class Dashboardctrl extends BaseController
{
    private $ProvinsiModels;
    private $KabkotaModels;
    private $MemberModels;
    private $PengumumanModels;
    private $KategoriVideoModels;
    private $VideoPembelajaranModels;
    private $KeuntunganModel;
    private $KontakModels;
    private $ArtikelModel;
    private $KategoriModel;
    private $SocialMediaModels;
    


    public function __construct()
    {
        $this->KabkotaModels = new KabkotaModels();
        $this->ProvinsiModels = new ProvinsiModels();
        $this->MemberModels = new MemberModels();
        $this->PengumumanModels = new PengumumanModels();
        $this->KategoriVideoModels = new KategoriVideoModels();
        $this->VideoPembelajaranModels = new VideoPembelajaranModels();
        $this->KeuntunganModel = new KeuntunganModel();
        $this->KontakModels = new KontakModels();
        $this->ArtikelModel = new ArtikelModel();
        $this->KategoriModel = new KategoriModel();
        $this->SocialMediaModels = new SocialMediaModels();
    }
    
    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            // Jika pengguna belum login, arahkan ke halaman login
            return redirect()->to(base_url('login'));
        }

        // Periksa peran pengguna
        $role = session()->get('role');
        if ($role !== 'admin') {
            // Jika peran bukan admin, arahkan ke halaman lain (misal: user)
            return redirect()->to(base_url('/')); // Sesuaikan dengan URL halaman user
        }
        
        // Mengakses data dari model sesuai kebutuhan
        $data['totalKabkota'] = $this->KabkotaModels->countAll(); // Count all records in DPCModels
        $data['totalProvinsi'] = $this->ProvinsiModels->countAll(); // Count all records in DPDModels
        $data['totalMember'] = $this->MemberModels->where('role', 'user')->countAllResults(); // Count members with role 'user' in MemberModels
        $data['totalPengumuman'] = $this->PengumumanModels->countAll(); // Count all records in PengumumanModels
        $data['totalKategoriVideo'] = $this->KategoriVideoModels->countAll(); // Count all records in KategoriVideoModels
        $data['totalVideoPembelajaran'] = $this->VideoPembelajaranModels->countAll(); // Count all records in VideoPembelajaranModels
        $data['totalKeuntungan'] = $this->KeuntunganModel->countAll(); // Count all records in KeuntunganModel
        $data['totalKontak'] = $this->KontakModels->countAll(); // Count all records in KontakModels
        $data['totalArtikel'] = $this->ArtikelModel->countAll(); // Count all records in ArtikelModel
        $data['totalKategori'] = $this->KategoriModel->countAll(); // Count all records in KategoriModels
        $data['totalSocialMedia'] = $this->SocialMediaModels->countAll(); // Count all records in SocialMediaModels
  

        return view('admin/dashboard/index', $data);
    }

    public function routetoDashboard()
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

        return redirect()->to(base_url('admin/dashboard'));
    }
}
