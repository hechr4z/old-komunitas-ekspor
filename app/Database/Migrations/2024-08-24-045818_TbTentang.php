<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbTentang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tentang' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_tentang' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'visi' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'misi' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'deskripsi_tentang' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'video_tentang' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'logo' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'favicon' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'copyright' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_tentang', true);
        $this->forge->createTable('tb_tentang');
    }

    public function down()
    {
        $this->forge->dropTable('tb_tentang');
    }
}
