<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    protected $helpers = ['form'];

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */


    public function index()
    {
        $rol = session()->get('rol');

        // Verifica el rol y retorna la vista correspondiente
        if ($rol == 'Editor') {
            return view('usuarios/index_editor');
        } elseif ($rol == 'Validador') {
            return view('usuarios/index_validador');
        } else {
            // Si el rol no es 'editor' ni 'validador', redirige al inicio
            return redirect('/');
        }
    }

    public function registro()
    {
        $datos = [];
        return view('usuarios/registro', $datos);
    }

    public function iniciar_sesion()
    {
        return view('usuarios/iniciar_sesion');
    }

    public function autenticar()
    {

        $session = session();
        $modelo = new UsuariosModel();
        $usuario = $this->request->getVar('usuario');
        $password = $this->request->getVar('password');
        $data = $modelo->where('nombre_usuario', $usuario)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'                 => $data['id'],
                    'nombre_usuario'     => $data['nombre_usuario'],
                    'email'              => $data['email'],
                    'rol'                => $data['rol'],
                    'logged_in'          => TRUE
                ];
                $session->set($ses_data);
                return redirect()->route('usuario');
            } else {
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('iniciar_sesion');
            }
        } else {
            $session->setFlashdata('msg', 'Usuario incorrecto');
            return redirect()->to('iniciar_sesion');
        }
    }

    public function crear_cuenta()
    {

        $reglas = [
            'usuario'             => [
                'label' => 'usuario',
                'rules' => 'required|min_length[5]|max_length[10]|alpha_numeric|is_unique[usuarios.nombre_usuario]',
                'errors' => [
                    'required' => 'El nombre de {field} es obligatorio.',
                    'min_lenght' => 'El nombre de {field} debe tener una longitud minima de 5 caracteres.',
                    'alpha_numeric' => 'El nombre de {field} debe tener letras y numeros.',
                    'max_length' => 'El nombre de {field} no puede tener una longitud maxima que supere los 10 caracteres.',
                    'is_unique' => 'El nombre de {field} tiene que ser unico.'
                ],
            ],
            'nombre_completo'   => [
                'label' => 'nombre_completo',
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'El {field} es obligatorio.',
                    'min_lenght' => 'El {field} debe tener una longitud minima de 3 caracteres.',
                    'max_length' => 'El {field} no puede tener una longitud maxima que supere los 50 caracteres.',
                ],
            ],

            'email'             => [
                'label' => 'email',
                'rules' => 'required|min_length[6]|max_length[50]|valid_email',
                'errors' => [
                    'required' => 'El {field} es obligatorio.',
                    'min_lenght' => 'El {field} debe tener una longitud minima de 6 caracteres.',
                    'max_length' => 'El {field} no puede tener una longitud maxima que supere los 50 caracteres.',
                    'valid_email' => 'El {field} no es valido.'
                ],
            ],


            'rol'     => [
                'label' => 'rol',
                'rules' => 'required|',
                'errors' => [
                    'required' => 'El {field} es obligatorio.',
                ],
            ],

            'password'             => [
                'label' => 'contraseña',
                'rules' => 'required|min_length[6]|max_length[10]',
                'errors' => [
                    'required' => 'La {field} es obligatoria.',
                    'min_lenght' => 'La {field} es muy corta debe tener por lo menos 5 caracteres.',
                    'max_length' => 'La {field} no puede tener una longitud maxima que supere los 10 caracteres.',
                ],
            ],


            'c_password'             => [
                'label' => 'confirmar_contraseña',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'La {field} es obligatoria.',
                    'matches' => 'Las contraseñas no coinciden',
                ],
            ],
        ];

        if ($this->validate($reglas)) {
            $usuario = new UsuariosModel();
            $datos = [
                'nombre_usuario' => $this->request->getVar('usuario'),
                'nombre_completo' => $this->request->getVar('nombre_completo'),
                'rol' => $this->request->getVar('rol'),
                'email'     => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
            ];
            $usuario->save($datos);
            $session = session();
            $session->setFlashData("success", "Se ha creado la cuenta correctamente");

            return redirect()->to('iniciar_sesion');
        } else {
            $datos['validation'] = $this->validator;
            echo view('usuarios/registro', $datos);
        }
    }

    public function cerrar_sesion()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('iniciar_sesion');
    }



    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
