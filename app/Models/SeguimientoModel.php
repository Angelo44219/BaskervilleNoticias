<?php

namespace App\Models;

use CodeIgniter\Model;

class SeguimientoModel extends Model
{
    protected $table            = 'seguimiento';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_noticia','id_usuario','titulo_seg','descripcion_seg','imagen_seg','estado_seg','activo_seg','id_categoria_seg','fecha_modificacion','usuario_modificacion','tipo_modificacion','revertido'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
