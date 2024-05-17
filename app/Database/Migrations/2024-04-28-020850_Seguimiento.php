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
                'constraint'=> 12,
                'unsigned'=>true,
                'auto_increment'=>true
            ],

            'id_noticia'=>[
                'type'=>'INT',
                'constraint'=> 11,
                'unique'=>true
            ],

            'id_usuario'=>[
                'type'=>'INT',
                'constraint'=> 11,
            ],

            'titulo_seg'=>[
                'type'=>'VARCHAR',
                'constraint'=> 255
            ],

            'descripcion_seg'=>[
                'type'=>'VARCHAR',
                'constraint'=> 255
            ],

            'imagen_seg'=>[
                'type'=>'VARCHAR',
                'constraint'=>255
            ],

            'activo_seg'=>[
                'type'=>'INT',
                'constraint'=> 11
            ],

            'estado_seg'=>[
                'type'=>'ENUM',
                'constraint'=> ['rechazada','correccion','borrador','finalizada','publicada']
            ],

            'id_categoria_seg'=>[
                'type'=>'INT',
                'constraint'=> 11,
            ],

            'fecha_modificacion'=>[
                'type'=>'DATETIME',
            ]


        ]);

        $this->forge->addKey('id',true);
        $this->forge->addForeignKey('id_noticia','noticias','id');
        $this->forge->addForeignKey('id_usuario','usuarios','id');
        $this->forge->addForeignKey('id_categoria_seg','categorias','id');

        $this->forge->createTable('seguimiento');

    }

    public function down()
    {
        $this->forge->dropTable('seguimiento');
    }
}
