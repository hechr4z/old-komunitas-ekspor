<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateContentPlannerTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_content_planner' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'link_gdrive' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'sosial_media' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'content_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'content_pillar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'caption' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'cta_link' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'hashtag' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'post_date' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id_content_planner', true);
        $this->forge->createTable('tb_content_planner');
    }

    public function down()
    {
        $this->forge->dropTable('tb_content_planner');
    }
}
