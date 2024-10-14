<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbPengumumanTable extends Migration
{
    public function up()
    {
        // Membuat tabel tb_pengumuman
        $this->forge->addField([
            'id_pengumuman' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul_pengumuman' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'poster_pengumuman' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'deskripsi_pengumuman' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'mulai_pengumuman' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'akhir_pengumuman' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_pengumuman', true); // Primary key
        $this->forge->createTable('tb_pengumuman');  // Membuat tabel
    }

    public function down()
    {
        // Menghapus tabel tb_pengumuman
        $this->forge->dropTable('tb_pengumuman');
    }
}
