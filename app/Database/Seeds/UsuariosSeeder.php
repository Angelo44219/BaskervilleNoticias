<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        $data=[
            [
                'nombre_usuario'=>'Angelo44',
                'nombre_completo'=>'Angelo Whitedemon',
                'email'=>'AngeloWhitelust@gmail.com',
                'password'=>'Angelo29',
                'rol'=>'editor'
            ],
            [
                'nombre_usuario'=>'Jacob8',
                'nombre_completo'=>'Jacob Crhisfallen',
                'email'=>'JacobCris23@gmail.com',
                'password'=>'jacob20',
                'rol'=>'validador',
            ],
        ];

        $this->db->table('usuarios')->insertBatch($data);
    }
}
