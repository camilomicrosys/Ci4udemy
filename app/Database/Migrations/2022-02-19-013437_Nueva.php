<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Nueva extends Migration
{
    public function up()
    {
      $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombres'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'descripcion'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'categoria_id'          => [
                'type'           => 'INT',
                'constraint'     => 5
               
            ]

            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('nuevas'); 
    }

    public function down()
    {
       $this->forge->dropTable('nuevas');
   }
}
