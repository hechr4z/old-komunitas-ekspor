<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbProdukTable extends Migration
{
    public function up()
    {
        // Membuat tabel tb_produk
        $this->forge->addField([
            'id_produk' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_produk_in' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'null'       => false,
            ],
            'nama_produk_en' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'null'       => false,
            ],
            'foto_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'deskripsi_produk_in' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'deskripsi_produk_en' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_produk', true); // Primary key
        $this->forge->createTable('tb_produk'); // Membuat tabel
    }

    public function down()
    {
        // Menghapus tabel tb_produk
        $this->forge->dropTable('tb_produk');
    }
}
