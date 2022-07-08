<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GrupoMigration extends Migration
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
            'almoxarifado_id' => [
                'type' => 'INT',
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
        $this->forge->addForeignKey('almoxarifado_id', 'almoxarifados', 'id');
        $this->forge->createTable('grupos', true);
        
        
    }

    public function down()
    {
        $this->forge->dropTable('grupos');
    }
}
