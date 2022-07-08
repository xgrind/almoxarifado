<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlmoxarifadoMigration extends Migration
{    
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',                
                'auto_increment' => true,
            ],
            'descricao' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ativo' => [
                'type' => 'CHAR',
                'constraint' => 1,
                'default' => 's'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('almoxarifados', true);
    }

    public function down()
    {
        $this->forge->dropTable('almoxarifados');
    }
}
