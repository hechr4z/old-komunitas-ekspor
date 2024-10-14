<?php

namespace App\Controllers\NewUser;

use App\Controllers\NewUser\BaseController;
use App\Models\MemberModels;
use App\Models\ProvinsiModels;
use App\Models\KabkotaModels;

class MemberController extends BaseController
{
    protected $memberModels;
    protected $provinsiModels;
    protected $kabkotaModels;

    public function __construct()
    {
        parent::__construct();
        $this->memberModels = new MemberModels();
        $this->provinsiModels = new ProvinsiModels();
        $this->kabkotaModels = new KabkotaModels();
    }

    public function index()
    {
        // Mengambil semua data member dengan informasi lokasi (provinsi, kabupaten/kota)
        $members = $this->memberModels->getAllMembersWithLocation();
    
        // Pastikan data adalah array objek
        if (!is_array($members)) {
            $members = [];
        }
    
        return $this->render('NewUser/member/index', [
            'title' => 'Daftar Member',
            'members' => $members
        ]);
    }
    
    
    public function detail($id_member)
    {
        // Ambil member yang sedang dilihat
        $member = $this->memberModels->getMemberById($id_member);
    
        // Cek jika member ditemukan
        if ($member) {
            // Ambil member lainnya (kecuali member yang sedang dilihat)
            $other_members = $this->memberModels->where('id_member !=', $id_member)->findAll(5); // Misalnya ambil 5 member lainnya
            
            // Kirim data member dan other_members ke tampilan
            return view('NewUser/member/detail', [
                'member' => $member,
                'other_members' => $other_members
            ]);
        } else {
            // Jika member tidak ditemukan, arahkan ke halaman error atau halaman daftar member
            return redirect()->to('/NewUser/member')->with('error', 'Member tidak ditemukan');
        }
    }
    


    public function filterByLocation($id_provinsi = null, $id_kabkota = null)
    {
        // Menampilkan daftar member berdasarkan provinsi atau kabupaten/kota tertentu
        $query = $this->memberModels;

        if ($id_provinsi) {
            $query = $query->where('id_provinsi', $id_provinsi);
        }

        if ($id_kabkota) {
            $query = $query->where('id_kabkota', $id_kabkota);
        }

        $members = $query->findAll();

        return $this->render('NewUser/member/index', [
            'title' => 'Filter Member',
            'members' => $members
        ]);
    }
}
