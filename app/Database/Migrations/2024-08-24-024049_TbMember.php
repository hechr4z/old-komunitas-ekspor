<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbMemberTable extends Migration
{
    public function up()
    {
        // Membuat tabel tb_member
        $this->forge->addField([
            'id_member' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => 'user',
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'nama_member' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'id_provinsi' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'id_kabkota' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'status_kepengurusan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'alamat_member' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'no_hp_member' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'email_member' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'ig_member' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'fb_member' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'pendidikan_member' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'pekerjaan_member' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'sertifikasi_member' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'jenis_kelamin' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
            ],
            'foto_member' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'cv_member' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_member', true); // Primary key
        $this->forge->addUniqueKey('username');  // Unique key
        $this->forge->createTable('tb_member');  // Membuat tabel
    }

    public function down()
    {
        // Menghapus tabel tb_member
        $this->forge->dropTable('tb_member');
    }
}
