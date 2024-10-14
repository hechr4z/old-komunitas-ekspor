<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbKontak extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kontak' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'deskripsi' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'kontak' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'no_hp' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
                'null'       => true,
            ],
            'alamat' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'embed_code' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_kontak', true);
        $this->forge->createTable('tb_kontak');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kontak');
    }
}
