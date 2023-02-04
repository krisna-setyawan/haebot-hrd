<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
    public function up()
    {
        // Customer
        $fields = [
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama'             => ['type' => 'varchar', 'constraint' => 80],
            'slug'             => ['type' => 'varchar', 'constraint' => 255],
            'alamat'           => ['type' => 'varchar', 'constraint' => 255],
            'no_telp'          => ['type' => 'varchar', 'constraint' => 20],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('customer', true);
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}
