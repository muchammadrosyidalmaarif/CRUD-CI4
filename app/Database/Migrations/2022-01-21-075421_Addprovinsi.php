<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProvinsi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_provinsi'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_provinsi'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
           
          
        ]);
        $this->forge->addKey('id_provinsi', true);
        $this->forge->createTable('provinsi');
    }

    public function down()
    {
        $this->forge->dropTable('provinsi');
    }
}