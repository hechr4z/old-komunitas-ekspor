<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbSliderTable extends Migration
{
    public function up()
    {
        // Membuat tabel tb_slider
        $this->forge->addField([
            'id_slider' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'file_foto_slider' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('id_slider', true); // Primary key
        $this->forge->createTable('tb_slider'); // Membuat tabel
    }

    public function down()
    {
        // Menghapus tabel tb_slider
        $this->forge->dropTable('tb_slider');
    }
}
