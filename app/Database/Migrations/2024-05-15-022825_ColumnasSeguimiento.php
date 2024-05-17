<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ColumnasSeguimiento extends Migration
{
    public function up()
    {
        $this->forge->addColumn('seguimiento',[

    
            'usuario_modificacion' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'tipo_modificacion' => [
                'type' => 'ENUM',
                'constraint' => ['creacion', 'edicion', 'descarte'],
                'null' => false,
            ],

            'revertido' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],

        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('seguimiento', 'usuario_modificacion');
        $this->forge->dropColumn('seguimiento', 'tipo_modificacion');
        $this->forge->dropColumn('seguimiento', 'revertido');
    }
}
