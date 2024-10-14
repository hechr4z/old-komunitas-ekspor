<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateContentPillarTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_content_pillar' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_content_pillar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_content_pillar', true);
        $this->forge->createTable('tb_content_pillar');
    }

    public function down()
    {
        $this->forge->dropTable('tb_content_pillar');
    }
}
