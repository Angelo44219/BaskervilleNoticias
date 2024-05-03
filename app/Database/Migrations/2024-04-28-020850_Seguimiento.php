<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Seguimiento extends Migration
{
    public function up()
    {
        $this->forge->addField([


            'id'=>[
                'type'=>'INT',
                'constraint'=> 11,
                'unsigned'=>true,
                'auto_increment'=>true
            ],

            'id_noticia'=>[
                'type'=>'INT',
                'constraint'=> 12,
                'unique'=>true
            ],

            'id_usuario'=>[
                'type'=>'INT',
                'constraint'=> 12,
                'unique'=>true
            ],

            'fecha_modificacion'=>[
                'type'=>'DATETIME',
            ],

            'cambios'=>[
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],


        ]);

        $this->forge->addKey('id',true);
        $this->forge->addForeignKey('id_noticia','noticias','id');
        $this->forge->addForeignKey('id_usuario','usuarios','id');

        $this->forge->createTable('seguimiento');

    }

    public function down()
    {
        $this->forge->dropTable('seguimiento');
    }
}
