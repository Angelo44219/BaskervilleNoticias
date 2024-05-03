<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregarColumnasNoticia extends Migration
{
    public function up()
    {
        $this->forge->addColumn('noticias',[
            'noticia_activa'=>[
                'type'=>'INT',
                'after'=>'fecha',
                'constraint'=> 11
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('noticias', 'noticia_activa');
    }
}
