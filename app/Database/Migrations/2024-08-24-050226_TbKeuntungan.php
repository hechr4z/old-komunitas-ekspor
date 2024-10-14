<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbKeuntungan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_keuntungan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul_keuntungan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'deskripsi_keuntungan' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'icon_keuntungan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_keuntungan', true);
        $this->forge->createTable('tb_keuntungan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_keuntungan');
    }
}
