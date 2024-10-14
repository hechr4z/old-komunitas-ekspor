<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbVideoTable extends Migration
{
    public function up()
    {
        // Membuat tabel tb_video
        $this->forge->addField([
            'id_video' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul_video' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'video_url' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'thumbnail' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'deskripsi_video' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'id_katvideo' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_video', true); // Primary key
        $this->forge->createTable('tb_video');  // Membuat tabel
    }

    public function down()
    {
        // Menghapus tabel tb_video
        $this->forge->dropTable('tb_video');
    }
}
