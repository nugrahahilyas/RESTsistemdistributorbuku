<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailPenjualan extends Migration
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
            'id_penjualan' => [
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
            'subtotal' => [
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
        $this->forge->addForeignKey('id_penjualan', 'penjualan', 'id_penjualan');
        $this->forge->addForeignKey('id_buku', 'buku', 'id_buku');
        $this->forge->createTable('detailpenjualan');
    }

    public function down()
    {
        $this->forge->dropTable('detailpenjualan');
    }
}
