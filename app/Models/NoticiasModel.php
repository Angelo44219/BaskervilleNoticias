<?php

namespace App\Models;

use CodeIgniter\Model;

class NoticiasModel extends Model
{
    protected $table            = 'noticias';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['editor_id','titulo','descripcion','fecha','noticia_activa','estado','categoria_id','imagen','fecha_publicacion','fecha_expiracion','motivo'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


}


