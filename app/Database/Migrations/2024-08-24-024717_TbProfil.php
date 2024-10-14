<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbProfilTable extends Migration
{
    public function up()
    {
        // Membuat tabel tb_profil
        $this->forge->addField([
            'id_profil' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'nama_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'logo_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'deskripsi_perusahaan_in' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'deskripsi_perusahaan_en' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'deskripsi_kontak_in' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'deskripsi_kontak_en' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'link_maps' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'link_whatsapp' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'favicon_website' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'title_website' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'foto_utama' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'no_hp' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'teks_footer' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('id_profil', true); // Primary key
        $this->forge->createTable('tb_profil');  // Membuat tabel
    }

    public function down()
    {
        // Menghapus tabel tb_profil
        $this->forge->dropTable('tb_profil');
    }
}
