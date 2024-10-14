<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbKategoriVideoTable extends Migration
{
    public function up()
    {
        // Membuat tabel tb_kategori_video
        $this->forge->addField([
            'id_katvideo' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kategori_video' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
        ]);
        

        $this->forge->addKey('id_katvideo', true); // Primary key
        $this->forge->createTable('tb_kategori_video');  // Membuat tabel
    }

    public function down()
    {
        // Menghapus tabel tb_kategori_video
        $this->forge->dropTable('tb_kategori_video');
    }
}
