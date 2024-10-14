<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbAktivitasTable extends Migration
{
    public function up()
    {
        // Membuat tabel tb_aktivitas
        $this->forge->addField([
            'id_aktivitas' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_aktivitas_in' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'null'       => false,
            ],
            'nama_aktivitas_en' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'null'       => false,
            ],
            'foto_aktivitas' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'deskripsi_aktivitas_in' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'deskripsi_aktivitas_en' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_aktivitas', true); // Primary key
        $this->forge->createTable('tb_aktivitas'); // Membuat tabel
    }

    public function down()
    {
        // Menghapus tabel tb_aktivitas
        $this->forge->dropTable('tb_aktivitas');
    }
}