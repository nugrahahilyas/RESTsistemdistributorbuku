<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Detailretur extends Migration
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
            ],
            'id_buku' => [
                'type'       => 'VARCHAR',
                'constraint' => 12,
            ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => 5
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
        $this->forge->addForeignKey('id_retur', 'retur', 'id_retur');
        $this->forge->addForeignKey('id_buku', 'buku', 'id_buku');
        $this->forge->createTable('detailretur');
    }

    public function down()
    {
        $this->forge->dropTable('detailretur');
    }
}
