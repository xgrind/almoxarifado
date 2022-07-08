<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProdutoMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ativo' => [
                'type' => 'CHAR',
                'constraint' => 1,
                'default' => 's'
            ],
            'grupo_id' => [
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
        $this->forge->addForeignKey('grupo_id', 'grupos', 'id');
        $this->forge->createTable('produtos', true);
        
    }

    public function down()
    {
        $this->forge->dropTable('produtos');
    }
}
