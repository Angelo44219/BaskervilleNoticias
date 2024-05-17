<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Sesion extends BaseController
{
    public function index()
    {
        $session = session();
        echo "Bienvenido!, ".$session->get('nombre_usuario');
    }
}
