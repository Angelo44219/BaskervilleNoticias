<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ColumnasUsuario extends Migration
{
    public function up()
    {
        $this->forge->addColumn('usuarios',[
            'foto_perfil'=>[
                'type'=>'VARCHAR',
                'after'=>'nombre_completo',
                'constraint'=>255,
                'null'=>true
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('usuarios','foto_perfil');
    }
}
