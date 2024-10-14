<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "tb_user";
    protected $primaryKey = "id_user";
    protected $returnType = "object";
    protected $allowedFields = ['id_user', 'nama_user', 'username', 'password', 'role', 'menu_tampil', 'hs_code'];


    public function getProfil()
    {
        if (isset($_SESSION['username'])) {
            // Ambil data panduan khusus dari pengguna yang sedang login
            $userData = $this->db->table('tb_user')
                ->where('username', $_SESSION['username'])
                ->get()
                ->getResultArray();

            return $userData;
        }
    }
    
    public function getMenu()
    {
    
        // Ambil username dari sesi
        $username = $_SESSION['username'];
                        
        // Query untuk mengambil data pengguna dari tabel tb_user berdasarkan username
        // Sesuaikan dengan nama tabel dan kolom yang sesuai di database Anda
        $query = $this->db->table('tb_user')
                    ->where('username', $username)
                    ->get();
                        
                    // Periksa apakah ada hasil dari query
                    if ($query->resultID->num_rows > 0) {
                        // Ambil data pengguna dari hasil query
                        $userData = $query->getRow();
                        
                        // Split nilai kolom 'menu_tampil' menjadi array jika perlu
                        $menuTampil = explode(',', $userData->menu_tampil);
                        
                        // Sekarang, $userData berisi semua informasi pengguna, dan $menuTampil berisi menu yang diizinkan
                        // Anda dapat mengakses data pengguna dan menu seperti ini:
                        $username = $userData->username;
                        $menuArray = $menuTampil;
                            
                        return $menuArray;
                        
                        // Kemudian, Anda dapat menggunakan $username dan $menuArray untuk membangun menu sesuai dengan hak akses pengguna
                    } else {
                        // Pengguna tidak ditemukan
                        // Lakukan tindakan yang sesuai jika pengguna tidak ditemukan
                        return [];
                    }

    }


}
