<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbKategoriTable extends Migration
{
    public function up()
    {
        // Membuat tabel tb_kategori
        $this->forge->addField([
            'id_kategori' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_kategori', true); // Primary key
        $this->forge->createTable('tb_kategori');  // Membuat tabel
    }

    public function down()
    {
        // Menghapus tabel tb_kategori
        $this->forge->dropTable('tb_kategori');
    }
}
