<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        $data=[
            [
                'nombre'=>'Clima'
            ],
            [
                'nombre'=>'Loteria'
            ],
            [
                'nombre'=>'El mundo'
            ],
        ];

        $this->db->table('categorias')->insertBatch($data);
    }
}
