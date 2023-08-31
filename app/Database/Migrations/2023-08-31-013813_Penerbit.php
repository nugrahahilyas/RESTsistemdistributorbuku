<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penerbit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'id_penerbit' => [
                'type'              => 'VARCHAR',
                'constraint'        => 8,
                'unique'            => true
            ],
            'nama_penerbit'     => [
                'type'          => 'VARCHAR',
                'constraint'    => '50'
            ],
            'alamat'            => [
                'type'          => 'VARCHAR',
                'constraint'    => '128'
            ],
            'no_hp'            => [
                'type'          => 'VARCHAR',
                'constraint'    => '15'
            ],
            'created_at'        => [
                'type'          => 'DATETIME',
                'null'          => true
            ],
            'updated_at'        => [
                'type'          => 'DATETIME',
                'null'          => true
            ]
        ]);
        $this->forge->addKey('id', true); // DEFINISIKAN PRIMARY KEY
        $this->forge->createTable('penerbit');
    }

    public function down()
    {
        $this->forge->dropTable('penerbit');
    }
}
