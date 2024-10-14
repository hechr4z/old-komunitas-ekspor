<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSosialMediaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sosial_media' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_sosial_media' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'warna_sosial_media' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_sosial_media', true);
        $this->forge->createTable('tb_sosial_media');
    }

    public function down()
    {
        $this->forge->dropTable('tb_sosial_media');
    }
}
