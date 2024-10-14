<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbDpdTable extends Migration
{
    public function up()
    {
        // Membuat tabel tb_provinsi
        $this->forge->addField([
            'id_provinsi' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_provinsi' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('id_provinsi', true); // Primary key // {{ edit_3 }}
        $this->forge->createTable('tb_provinsi');  // Membuat tabel // {{ edit_4 }}
    }
    public function down()
    {
        // Menghapus tabel tb_dpd
        $this->forge->dropTable('tb_provinsi');
    }
}
