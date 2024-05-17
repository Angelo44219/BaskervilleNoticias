<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriasModel extends Model
{
    protected $table            = 'categorias';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;

    public function obtener_nombre_categoria($id_categoria)
    {
        $resultado = $this->db->table($this->table)
            ->select('nombre')
            ->where('id', $id_categoria)
            ->get();

        if ($resultado->getNumRows() > 0) {
            return $resultado->getRow('nombre');
        } else {
            return false;
        }
    }
}
