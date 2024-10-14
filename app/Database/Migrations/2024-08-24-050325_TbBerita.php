<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbBerita extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_berita' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul_berita' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'poster_berita' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'deskripsi_berita' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'mulai_berita' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'akhir_berita' => [
                'type'       => 'DATETIME',
                'null'       => false,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_berita', true);
        $this->forge->createTable('tb_berita');
    }

    public function down()
    {
        $this->forge->dropTable('tb_berita');
    }
}
