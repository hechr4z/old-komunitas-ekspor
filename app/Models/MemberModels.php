<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModels extends Model
{

    protected $table = "tb_member";
    protected $primaryKey = "id_member";
    protected $returnType = "object";
    protected $allowedFields = ['id_member','role', 'username','password','nama_member', 'id_kabkota','status_kepengurusan','alamat_member','no_hp_member','email_member','ig_member','fb_member','pendidikan_member','pekerjaan_member','sertifikasi_member','jenis_kelamin','foto_member','slug', 'cv_member'];


    public function getMember()
    {
         return $this->db->table('tb_member')->get()->getResultArray();  
    }
    
    public function getProfil()
    {
        if (isset($_SESSION['id_member'])) {
            // Ambil data panduan khusus dari pengguna yang sedang login
            $userData = $this->db->table('tb_member')
                ->where('id_member', $_SESSION['id_member'])
                ->get()
                ->getResultArray();

            return $userData;
        }
    }
    
    public function getMemberAdmin()
    {
         return $this->db->table('tb_member')
         ->join('tb_kabkota','tb_kabkota.id_kabkota=tb_member.id_kabkota')
         ->where('role', 'user')
         ->orderBy('id_member', 'desc')
         ->get()->getResultArray();  
    }
    
    public function getMemberUser()
    {
         return $this->db->table('tb_member')
         ->join('tb_kabkota','tb_kabkota.id_kabkota=tb_member.id_kabkota')
         ->where('role', 'user')
         ->orderBy('RAND()')
         ->get()->getResultArray();  
    }
    
    public function getDetailMember($id_member, $slug)
    {
         return $this->db->table('tb_member')
         ->join('tb_kabkota','tb_kabkota.id_kabkota=tb_member.id_kabkota')
         ->where('tb_member.id_member', $id_member)
         ->where('tb_member.slug', $slug)
         ->get()->getResultArray();  
    }
    
    public function getMemberLainnya($id_member)
    {
        return $this->db->table('tb_member')
            ->join('tb_kabkota','tb_kabkota.id_kabkota=tb_member.id_kabkota')
            ->where('id_member !=', $id_member)
            ->where('role', 'user')
            ->orderBy('RAND()')
            ->limit(4)
            ->get()->getResultArray();
    }
    
    public function getMembersByprovinsi($id_provinsi)
    {
        return $this->table('tb_member')
            ->join('tb_kabkota', 'tb_kabkota.id_kabkota=tb_member.id_kabkota')
            ->where('tb_kabkota.id_provinsi', $id_provinsi)
            ->where('role', 'user') // Hanya tampilkan member dengan role 'user'
            ->orderBy('RAND()') // Sesuaikan dengan field yang sesuai
            ->get()
            ->getResultArray();
    }

    
    public function searchMember($kabkota, $search)
    {
        $query = $this->table('tb_member')
            ->join('tb_kabkota', 'tb_kabkota.id_kabkota=tb_member.id_kabkota')
            ->where('role', 'user');
    
        if (!empty($kabkota)) {
            $query->like('nama_kabkota', $kabkota);
        }
    
        if (!empty($search)) {
            $query->groupStart()
                ->like('pekerjaan_member', $search)
                ->orLike('pendidikan_member', $search)
                ->orLike('nama_member', $search)
                ->orLike('status_kepengurusan', $search)
                ->orLike('alamat_member', $search)
                ->orLike('no_hp_member', $search)
                ->orLike('email_member', $search)
                ->orLike('ig_member', $search)
                ->orLike('fb_member', $search)
                ->orLike('sertifikasi_member', $search)
                ->groupEnd();
        }
    
        $query->orderBy('RAND()');
    
        return $query->get()->getResultArray();
    }
    public function getAllMembersWithLocation()
    {
        return $this->db->table('tb_member')
        ->select('tb_member.*, tb_provinsi.nama_provinsi, tb_kabkota.nama_kabkota')
        ->join('tb_provinsi', 'tb_member.id_provinsi = tb_provinsi.id_provinsi', 'left')
        ->join('tb_kabkota', 'tb_member.id_kabkota = tb_kabkota.id_kabkota', 'left')
        ->get()
        ->getResult();

    }
    
    
    public function getMembers()
{
    return $this->db->table('tb_member')
        ->select('tb_member.*, tb_provinsi.nama_provinsi, tb_role.nama_role') // Sesuaikan tabel
        ->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_member.id_provinsi', 'left') // Sesuaikan relasi
        ->join('tb_role', 'tb_role.id_role = tb_member.id_role', 'left') // Sesuaikan relasi
        ->get()
        ->getResult();
}
public function getMemberById($id_member)
{
    return $this->db->table('tb_member')
        ->select('tb_member.*, tb_provinsi.nama_provinsi, tb_kabkota.nama_kabkota') // Pastikan tb_kabkota juga diambil
        ->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_member.id_provinsi', 'left')
        ->join('tb_kabkota', 'tb_kabkota.id_kabkota = tb_member.id_kabkota', 'left') // Join ke tb_kabkota
        ->where('tb_member.id_member', $id_member)
        ->get()
        ->getRow();
}





}
