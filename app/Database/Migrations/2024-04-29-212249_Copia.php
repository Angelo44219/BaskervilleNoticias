<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Copia extends Migration
{
    public function up()
    {
        $this->forge->addField([


            'id'=>[
                'type'=>'INT',
                'constraint'=> 12,
                'unsigned'=>true,
                'auto_increment'=>true
            ],

            'titulo_copia'=>[
                'type'=>'VARCHAR',
                'constraint'=> 255
            ],

            'descripcion_copia'=>[
                'type'=>'VARCHAR',
                'constraint'=> 255
            ],

            'imagen_copia'=>[
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],

            'noticia_activa'=>[
                'type'=>'INT',
                'constraint'=> 11
            ],

            'id_noticia'=>[
                'type'=>'INT',
                'constraint'=> 11
            ],

            'id_categoria_copia'=>[
                'type'=>'INT',
                'constraint'=> 11
            ]


        ]);

        $this->forge->addKey('id',true);
        $this->forge->addForeignKey('id_noticia','noticias','id');
        $this->forge->addForeignKey('id_categoria_copia','categorias','id');

        $this->forge->createTable('copia');
    }

    public function down()
    {
        $this->forge->dropTable('copia');
    }
}
