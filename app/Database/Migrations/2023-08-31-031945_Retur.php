<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Retur extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_retur' => [
                'type'       => 'VARCHAR',
                'constraint' => 8,
                'unique' => true
            ],
            'total' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('retur');
    }

    public function down()
    {
        $this->forge->dropTable('retur');
    }
}
