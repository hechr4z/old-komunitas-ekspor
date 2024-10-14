<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateContentTypeTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_content_type' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_content_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_content_type', true);
        $this->forge->createTable('tb_content_type');
    }

    public function down()
    {
        $this->forge->dropTable('tb_content_type');
    }
}
