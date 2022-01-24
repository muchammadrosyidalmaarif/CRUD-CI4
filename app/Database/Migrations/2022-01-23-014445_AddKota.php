<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKota extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kota'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kota'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jml_penduduk'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_provinsi'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
              
            ],
          
        ]);
        $this->forge->addKey('id_kota', true);
        $this->forge->addForeignKey('id_provinsi', 'provinsi', 'id_provinsi');
        $this->forge->createTable('kota');
    }

    public function down()
    {
        $this->forge->dropTable('kota');
    }
}