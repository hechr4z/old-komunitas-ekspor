<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbMemberTable extends Migration
{
    public function up()
    {
        // Membuat tabel tb_member
        $this->forge->addField([
            'id_member' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => 'user',
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'kode_referral' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'popular_point' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'id_kabkota' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'nama_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_perusahaan' => [
                'type' => 'TEXT',
            ],
            'tipe_bisnis' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'produk_utama' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'tahun_dibentuk' => [
                'type' => 'YEAR',
            ],
            'skala_bisnis' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'email_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'pic' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'pic_phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
            ],
            'tanggal_verifikasi' => [
                'type'    => 'DATETIME',
            ],
            'kategori_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'sertifikat' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'foto_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_produk' => [
                'type'       => 'TEXT',
            ],
            'hs_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'minimum_order_qty' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 1,
            ],
            'minimum_order_qty' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 1,
            ],
        ]);

        $this->forge->addKey('id_member', true); // Primary key
        $this->forge->addUniqueKey('username');  // Unique key
        $this->forge->createTable('tb_member');  // Membuat tabel
    }

    public function down()
    {
        // Menghapus tabel tb_member
        $this->forge->dropTable('tb_member');
    }
}
