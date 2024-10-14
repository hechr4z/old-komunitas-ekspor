<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbDpcTable extends Migration
{
    public function up()
    {
        // Membuat tabel tb_kabkota
        $this->forge->addField([
            'id_kabkota' => [ // {{ edit_1 }}
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_provinsi' => [ // {{ edit_2 }}
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'nama_kabkota' => [ // {{ edit_3 }}
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'wilayah_kerja_kabkota' => [ // {{ edit_4 }}
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('id_kabkota', true); // Primary key // {{ edit_5 }}
        $this->forge->createTable('tb_kabkota'); // Membuat tabel // {{ edit_6 }}
    }

    public function down()
    {
        // Menghapus tabel tb_dpc
        $this->forge->dropTable('tb_kabkota');
    }
}
