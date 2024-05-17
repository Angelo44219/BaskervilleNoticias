<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ColumnasNoticia extends Migration
{
    public function up()
    {
        $this->forge->addColumn('noticias',[
            'fecha_publicacion'=>[
                'type'=> 'DATETIME',
                'null'=> true,
            ],
            'fecha_expiracion' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'motivo' => [
                'type' => 'VARCHAR',
                'constraint'=>255,
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
            $this->forge->dropColumn('noticias','motivo');
            $this->forge->dropColumn('noticias','fecha_publicacion');
            $this->forge->dropColumn('noticias','fecha_expiracion');
            
    }
}
