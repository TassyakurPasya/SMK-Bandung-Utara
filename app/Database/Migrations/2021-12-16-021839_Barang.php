<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_Jenis'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'id_ukuran'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'id_keterangan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'id_lot'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'id_grade'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'berat'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
