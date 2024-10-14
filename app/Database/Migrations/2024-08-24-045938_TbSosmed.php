<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbSosmed extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sosmed' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'icon_sosmed' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'link_sosmed' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'nama_sosmed' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_sosmed', true);
        $this->forge->createTable('tb_sosmed');
    }

    public function down()
    {
        $this->forge->dropTable('tb_sosmed');
    }
}
