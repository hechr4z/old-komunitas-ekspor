<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbTestimonials extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_testimonial' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_member' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'jabatan_testimonial' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'deskripsi_testimonial' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'foto_testimonial' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
       
        ]);

        $this->forge->addKey('id_testimonial', true);
        $this->forge->createTable('tb_testimonial');
    }

    public function down()
    {
        $this->forge->dropTable('tb_testimonial');
    }
}
