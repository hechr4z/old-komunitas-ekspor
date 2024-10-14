<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TbMemberSeeder extends Seeder
{
    public function run()
    {
        // Hash password
        $hashedPasswordadmin = password_hash('admin', PASSWORD_DEFAULT);
        $hashedPasswordmember = password_hash('member', PASSWORD_DEFAULT);

        $data = [
            [
                'role'              => 'admin',
                'username'          => 'admin',
                'password'          => $hashedPasswordadmin, // Simpan password yang di-hash
                'nama_member'       => 'Admin',
                'id_provinsi'       => null,
                'id_kabkota'        => null,
                'status_kepengurusan' => null,
                'alamat_member'     => null,
                'no_hp_member'      => null,
                'email_member'      => null,
                'ig_member'         => null,
                'fb_member'         => null,
                'pendidikan_member' => null,
                'pekerjaan_member'  => null,
                'sertifikasi_member' => null,
                'jenis_kelamin'     => null,
                'foto_member'       => null,
                'cv_member'         => null,
                'slug'              => null,
            ],
            [
                'role'              => 'user',
                'username'          => 'member',
                'password'          => $hashedPasswordmember, // Simpan password yang di-hash
                'nama_member'       => 'member',
                'id_provinsi'       => null,
                'id_kabkota'        => null,
                'status_kepengurusan' => null,
                'alamat_member'     => null,
                'no_hp_member'      => null,
                'email_member'      => null,
                'ig_member'         => null,
                'fb_member'         => null,
                'pendidikan_member' => null,
                'pekerjaan_member'  => null,
                'sertifikasi_member' => null,
                'jenis_kelamin'     => null,
                'foto_member'       => null,
                'cv_member'         => null,
                'slug'              => null,
            ],
        ];

        // Menggunakan Query Builder untuk insert data
        $this->db->table('tb_member')->insertBatch($data);
    }
}
