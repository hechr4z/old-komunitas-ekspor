<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbLinkFounder extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_link_founder' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_founder' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'nama_link_founder' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'icon_link_founder' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'link_founder' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_link_founder', true);
        $this->forge->addForeignKey('id_founder', 'tb_founder', 'id_founder', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_link_founder');
    }

    public function down()
    {
        $this->forge->dropTable('tb_link_founder');
    }
}
