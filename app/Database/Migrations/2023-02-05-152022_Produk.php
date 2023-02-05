<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        // Produk
        $fields = [
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama'              => ['type' => 'varchar', 'constraint' => 80],
            'slug'              => ['type' => 'varchar', 'constraint' => 255],
            'jenis'             => ['type' => 'enum', 'constraint' => ['UNKNOWN', 'SET', 'SINGLE', 'ECER'], 'default' => 'UNKNOWN'],
            'harga_beli'        => ['type' => 'int', 'unsigned' => true],
            'harga_jual'        => ['type' => 'int', 'unsigned' => true],
            'stok'              => ['type' => 'int', 'constraint' => 11,],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('produk', true);


        // Produk Plan
        $fields = [
            'id'                    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_produk_jadi'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'id_produk_bahan'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'qty_bahan'             => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_produk_jadi', 'produk', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('id_produk_bahan', 'produk', 'id', '', 'CASCADE');
        $this->forge->createTable('produk_plan', true);
    }

    public function down()
    {
        $this->forge->dropTable('produk_plan');
        $this->forge->dropTable('produk');
    }
}
