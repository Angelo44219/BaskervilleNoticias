<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriasModel;
use App\Models\NoticiasModel;
use App\Models\SeguimientoModel;
use App\Models\UsuariosModel;
use CodeIgniter\I18n\Time;

class Noticias extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */

    protected $helpers = ['form'];

    public function index()
    {
        $db = \Config\Database::connect();
        // Construye la consulta SQL
        if ($db->tableExists('noticias')) {
            $builder = $db->table('noticias');

            // Verifica que las columnas existen
            $fields = $db->getFieldNames('noticias');

            $builder->select('*');
            $builder->where('estado', 'publicada');
            $builder->where('noticia_activa', 1);
        } else {
            echo "La tabla 'noticias' no existe.<br>";
        }

        // Ejecuta la consulta y obtiene los resultados
        $query = $builder->get();
        $result = $query->getResultArray(); // Modificado aquí

        $categoriasModel = new CategoriasModel();

        // Llama a la función obtener_nombre_categoria
        foreach ($result as &$noticia) {
            $nombre_categoria = $categoriasModel->obtener_nombre_categoria($noticia['categoria_id']); // Modificado aquí
            if ($nombre_categoria) {
                $noticia['nombre_categoria'] = $nombre_categoria; // Modificado aquí
            } else {
                $noticia['nombre_categoria'] = 'Categoría no encontrada'; // Modificado aquí
            }
        }

        return view('noticias/index_noticia', ['noticias' => $result]);
    }

    public function mostrar_noticias_publicadas()
    {
        // Conecta a la base de datos
        $db = \Config\Database::connect();
        // Construye la consulta SQL
        $builder = $db->table('noticias');
        $builder->select('id', 'titulo', 'descripcion', 'fecha_publicacion', 'categoria_id', 'imagen');
        $builder->join('categorias', 'id');
        $builder->where('estado', 'publicada');
        $builder->where('noticia_activa', 1);

        // Ejecuta la consulta y obtiene los resultados
        $query = $builder->get();
        $result = $query->getResult();



        return view('noticias/index_noticia', ['noticias' => $result]);
    }

    public function mostrar_borradores()
    {
        // Obtiene el ID del usuario actual
        $session = session();
        $usuarioId = $session->get('id');

        // Obtiene el rol del usuario actual
        $rol = $session->get('rol');

        // Verifica si el usuario es un editor o un editor y validador
        if ($rol == 'Editor' || $rol == 'Ambos') {
            // Conecta a la base de datos
            $db = \Config\Database::connect();

            // Construye la consulta SQL
            $builder = $db->table('noticias');
            $builder->where('editor_id', $usuarioId);
            $builder->where('estado', 'borrador');
            $builder->where('noticia_activa', 1);

            // Ejecuta la consulta y obtiene los resultados
            $query = $builder->get();
            $result = $query->getResult();

            // Instancia el modelo CategoriasModel
            $categoriasModel = new CategoriasModel();

            // Llama a la función obtener_nombre_categoria
            foreach ($result as $noticia) {
                $nombre_categoria = $categoriasModel->obtener_nombre_categoria($noticia->categoria_id);
                if ($nombre_categoria) {
                    $noticia->nombre_categoria = $nombre_categoria;
                } else {
                    $noticia->nombre_categoria = 'Categoría no encontrada';
                }
            }

            // Retorna los resultados
            return view('noticias/borradores', ['noticias' => $result]);
        } else {
            // El usuario no es un editor, muestra un mensaje de error
            return 'No tienes permiso para ver estos borradores.';
        }
    }


    public function mostrar_publicadas()
    {
        // Obtiene el ID del usuario actual
        $session = session();
        $usuarioId = $session->get('id');

        // Obtiene el rol del usuario actual
        $rol = $session->get('rol');

        // Verifica si el usuario es un editor o un editor y validador
        if ($rol == 'Editor' || $rol == 'Ambos') {
            // Conecta a la base de datos
            $db = \Config\Database::connect();

            // Construye la consulta SQL
            $builder = $db->table('noticias');
            $builder->where('editor_id', $usuarioId);
            $builder->where('estado', 'publicada');
            $builder->where('noticia_activa', 1);

            // Ejecuta la consulta y obtiene los resultados
            $query = $builder->get();
            $result = $query->getResult();

            // Instancia el modelo CategoriasModel
            $categoriasModel = new CategoriasModel();

            // Llama a la función obtener_nombre_categoria
            foreach ($result as $noticia) {
                $nombre_categoria = $categoriasModel->obtener_nombre_categoria($noticia->categoria_id);
                if ($nombre_categoria) {
                    $noticia->nombre_categoria = $nombre_categoria;
                } else {
                    $noticia->nombre_categoria = 'Categoría no encontrada';
                }
            }

            // Retorna los resultados
            return view('noticias/publicadas', ['noticias' => $result]);
        } else {
            // El usuario no es un editor, muestra un mensaje de error
            return 'No tienes permiso para ver las noticias publicadas.';
        }
    }

    public function mostrar_en_correccion()
    {
        // Obtiene el ID del usuario actual
        $session = session();
        $usuarioId = $session->get('id');

        // Obtiene el rol del usuario actual
        $rol = $session->get('rol');

        // Verifica si el usuario es un editor o un editor y validador
        if ($rol == 'Editor' || $rol == 'Ambos') {
            // Conecta a la base de datos
            $db = \Config\Database::connect();

            // Construye la consulta SQL
            $builder = $db->table('noticias');
            $builder->where('editor_id', $usuarioId);
            $builder->where('estado', 'correccion');
            $builder->where('noticia_activa', 1);

            // Ejecuta la consulta y obtiene los resultados
            $query = $builder->get();
            $result = $query->getResult();

            // Instancia el modelo CategoriasModel
            $categoriasModel = new CategoriasModel();

            // Llama a la función obtener_nombre_categoria
            foreach ($result as $noticia) {
                $nombre_categoria = $categoriasModel->obtener_nombre_categoria($noticia->categoria_id);
                if ($nombre_categoria) {
                    $noticia->nombre_categoria = $nombre_categoria;
                } else {
                    $noticia->nombre_categoria = 'Categoría no encontrada';
                }
            }

            // Retorna los resultados
            return view('noticias/en_correccion', ['noticias' => $result]);
        } else {
            // El usuario no es un editor, muestra un mensaje de error
            return 'No tienes permiso para ver las noticias en correccion.';
        }
    }

    public function mostrar_desactivadas()
    {
        // Obtiene el ID del usuario actual
        $session = session();
        $usuarioId = $session->get('id');

        // Obtiene el rol del usuario actual
        $rol = $session->get('rol');

        // Verifica si el usuario es un editor o un editor y validador
        if ($rol == 'Editor' || $rol == 'Ambos') {
            // Conecta a la base de datos
            $db = \Config\Database::connect();

            // Construye la consulta SQL
            $builder = $db->table('noticias');
            $builder->where('editor_id', $usuarioId);
            $builder->where('noticia_activa', 0);

            // Ejecuta la consulta y obtiene los resultados
            $query = $builder->get();
            $result = $query->getResult();

            // Instancia el modelo CategoriasModel
            $categoriasModel = new CategoriasModel();

            // Llama a la función obtener_nombre_categoria
            foreach ($result as $noticia) {
                $nombre_categoria = $categoriasModel->obtener_nombre_categoria($noticia->categoria_id);
                if ($nombre_categoria) {
                    $noticia->nombre_categoria = $nombre_categoria;
                } else {
                    $noticia->nombre_categoria = 'Categoría no encontrada';
                }
            }

            // Retorna los resultados
            return view('noticias/desactivadas', ['noticias' => $result]);
        } else {
            // El usuario no es un editor, muestra un mensaje de error
            return 'No tienes permiso para ver las noticias desactivadas.';
        }
    }


    public function mostrar_rechazadas()
    {
        // Obtiene el ID del usuario actual
        $session = session();
        $usuarioId = $session->get('id');

        // Obtiene el rol del usuario actual
        $rol = $session->get('rol');

        // Verifica si el usuario es un editor o un editor y validador
        if ($rol == 'Editor' || $rol == 'Ambos') {
            // Conecta a la base de datos
            $db = \Config\Database::connect();

            // Construye la consulta SQL
            $builder = $db->table('noticias');
            $builder->where('editor_id', $usuarioId);
            $builder->where('estado', 'rechazada');
            $builder->where('noticia_activa', 0);

            // Ejecuta la consulta y obtiene los resultados
            $query = $builder->get();
            $result = $query->getResult();

            // Instancia el modelo CategoriasModel
            $categoriasModel = new CategoriasModel();

            // Llama a la función obtener_nombre_categoria
            foreach ($result as $noticia) {
                $nombre_categoria = $categoriasModel->obtener_nombre_categoria($noticia->categoria_id);
                if ($nombre_categoria) {
                    $noticia->nombre_categoria = $nombre_categoria;
                } else {
                    $noticia->nombre_categoria = 'Categoría no encontrada';
                }
            }

            // Retorna los resultados
            return view('noticias/rechazadas', ['noticias' => $result]);
        } else {
            // El usuario no es un editor, muestra un mensaje de error
            return 'No tienes permiso para ver las noticias rechazadas.';
        }
    }


    public function mostrar_editadas()
    {
        // Obtiene el ID del usuario actual
        $session = session();
        $usuarioId = $session->get('id');

        // Obtiene el rol del usuario actual
        $rol = $session->get('rol');

        // Verifica si el usuario es un editor o un editor y validador
        if ($rol == 'Editor' || $rol == 'Ambos') {
            // Conecta a la base de datos
            $db = \Config\Database::connect();

            // Construye la consulta SQL
            $builder = $db->table('noticias');
            $builder->where('editor_id', $usuarioId);
            $builder->where('estado', 'editada');
            $builder->where('noticia_activa', 0);


            // Ejecuta la consulta y obtiene los resultados
            $query = $builder->get();
            $result = $query->getResult();



            // Retorna los resultados
            return view('noticias/editadas', ['noticias' => $result]);
        } else {
            // El usuario no es un editor, muestra un mensaje de error
            return 'No tienes permiso para ver las noticias editadas.';
        }
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
        $noticias = new NoticiasModel();

        if ($id == null) {
            return redirect()->route('noticias');
        }

        $data['noticias'] = $noticias->find($id);

        return view('noticias/detalles_noticia', $data);
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $categoriaModel = new CategoriasModel();
        $datos['categorias'] = $categoriaModel->findAll();
        return view('noticias/nueva_noticia', $datos);
    }


    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        helper(['form']);
        $now = Time::now();
        $fechaHora = $now->format('Y-m-d H:i:s');
        $session = session();
        $usuario_nombre = $session->get('nombre_usuario');
        $usuarioId = $session->get('id');
        $rol = $session->get('rol');

        if ($rol == 'Editor' || $rol == 'Ambos') {
            // Define las reglas de validación
            $reglas = [
                'titulo' => [
                    'label' => 'titulo',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El {field} es obligatorio'
                    ]
                ],

                'descripcion' => [
                    'label' => 'descripcion',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'La {field} es obligatoria'
                    ]
                ],
                'categoria' => [
                    'label' => 'categoria',
                    'rules' => 'required|is_not_unique[categorias.id]',  // Asegúrate de reemplazar 'categoria1', 'categoria2', 'categoria3' con tus categorías válidas
                    'errors' => [
                        'required' => 'Seleccione al menos una {field}',
                        'in_list' => 'Debe seleccionar una {field} existente.'
                    ]
                ],

                'imagen' => [
                    'label' => 'imagen',
                    'rules' => 'mime_in[imagen,image/jpg,image/jpeg,image/gif,image/png]|max_size[imagen,4096]',
                    'errors' => [
                        'mime_in[imagen]' => ' Se requiere de una {field} que contenga las extensiones jpg, jpeg, gif y png',
                        'max_size[imagen]' => 'La {field} es demasiado pesada'
                    ]
                ]
            ];

            // Verifica si el formulario cumple con las reglas de validación
            if (!$this->validate($reglas)) {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }

            // Sube el archivo y obtiene la ruta
            $file = $this->request->getFile('imagen');

            if ($file->isValid() && !$file->hasMoved() && $file->getSize()) {
                $newName = $file->getRandomName();
                $file->move(ROOTPATH . 'public/uploads', $newName);
            } else {
                $newName = '';
            }

            $post = $this->request->getPost(['titulo', 'descripcion', 'categoria', 'es_activo', 'estado']);

            $noticiaModel = new NoticiasModel();

            $borradoresActivos = $noticiaModel->where(['editor_id' => $usuarioId, 'noticia_activa' => 1, 'estado' => 'borrador'])->countAllResults();

            if ($borradoresActivos >= 3 && $post['es_activo'] == 1 && $post['estado'] == 'borrador') {
                $session->setFlashdata('msg', 'Has alcanzado el límite de 3 noticias activas del tipo borrador.');
                return redirect()->to('nueva_noticia');
            }
            $noticiaModel->insert([
                'editor_id'        => $usuarioId,
                'titulo'           => $post['titulo'],
                'descripcion'      => $post['descripcion'],
                'fecha'            => $fechaHora,  // Guarda la fecha como timestamp
                'noticia_activa'   => $post['es_activo'],
                'estado'           => $post['estado'],
                'categoria_id'     => $post['categoria'],
                'imagen'           => $newName,  // Guarda solo el nombre del archivo
                'fecha_publicacion' => null,
                'fecha_expiracion' => null,
            ]);

            $noticiaId = $noticiaModel->insertID();

            $seguimiento = new SeguimientoModel();
            $seguimiento->insert([
                'id_noticia'           => $noticiaId,
                'id_usuario'           => $usuarioId,
                'titulo_seg'           => $post['titulo'],
                'descripcion_seg'      => $post['descripcion'],
                'imagen_seg'           => $newName,
                'activo_seg'           => $post['es_activo'],
                'estado_seg'           => $post['estado'],
                'id_categoria_seg'     => $post['categoria'],
                'fecha_modificacion'   => $fechaHora,
                'usuario_modificacion' => $usuario_nombre,
                'tipo_modificacion'    => 'creacion',
                'revertido'            => false,
                // Asume que el usuario que crea la noticia es el que la modifica
            ]);

            return redirect()->to(base_url('borradores'));
        } else {
            return 'No tienes permiso para crear una noticia.';
        }
    }

    public function validar()
    {

        // Obtiene el ID del usuario actual
        $session = session();

        // Obtiene el rol del usuario actual
        $rol = $session->get('rol');

        // Verifica si el usuario es un editor o un editor y validador
        if ($rol == 'Validador' || $rol == 'Ambos') {
            // Conecta a la base de datos
            $db = \Config\Database::connect();

            // Construye la consulta SQL
            $builder = $db->table('noticias');
            $builder->select('*');
            $builder->where('estado', 'validar');
            $builder->where('noticia_activa', 1);

            // Ejecuta la consulta y obtiene los resultados
            $query = $builder->get();
            $result = $query->getResult();

            // Retorna los resultados
            return view('noticias/validar', ['noticias' => $result]);
        } else {
            // El usuario no es un editor, muestra un mensaje de error
            return 'No puedes acceder a las validaciones';
        }
    }


    public function publicar_noticia($id = null)
    {
        $noticias = new NoticiasModel();
        $categorias = new CategoriasModel();

        if ($id == null) {
            return redirect()->route('noticias');
        }

        $data['categorias'] = $categorias->findAll();
        $data['noticia'] = $noticias->find($id);

        return view('noticias/formulario_publicar', $data);
    }

    public function rechazar_noticia($id = null)
    {
        $noticias = new NoticiasModel();
        $categorias = new CategoriasModel();

        if ($id == null) {
            return redirect()->route('noticias');
        }

        $data['categorias'] = $categorias->findAll();
        $data['noticia'] = $noticias->find($id);

        return view('noticias/formulario_rechazar', $data);
    }

    public function corregir_noticia($id = null)
    {
        $noticias = new NoticiasModel();
        $categorias = new CategoriasModel();

        if ($id == null) {
            return redirect()->route('noticias');
        }

        $data['categorias'] = $categorias->findAll();
        $data['noticia'] = $noticias->find($id);

        return view('noticias/formulario_corregir', $data);
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
        $noticias = new NoticiasModel();
        $categorias = new CategoriasModel();

        if ($id == null) {
            return redirect()->route('noticias');
        }

        $data['categorias'] = $categorias->findAll();
        $data['noticia'] = $noticias->find($id);

        return view('noticias/editar_noticia', $data);
    }

    public function rechazar($id)
    {
        $now = Time::now();
        $fechaHora = $now->format('Y-m-d H:i:s');
        $session = session();
        $usuario_nombre = $session->get('nombre_usuario');

        $post = $this->request->getPost(['estado', 'motivo']);

        $seguimiento = new SeguimientoModel();
        $noticia = new NoticiasModel();

        $datos = $noticia->find($id);

        $seguimiento->insert([
            'id_noticia'           => $datos['id'],
            'id_usuario'           => $datos['editor_id'],
            'id_categoria_seg'     => $datos['categoria_id'],
            'titulo_seg'           => $datos['titulo'],
            'descripcion_seg'      => $datos['descripcion'],
            'imagen_seg'           => $datos['imagen'],
            'activo_seg'           => $datos['noticia_activa'],
            'estado_seg'           => $datos['estado'],
            'usuario_modificacion' => $datos['editor_id'],
            'tipo_modificacion'    => 'creacion',
            'revertido'            => false,
        ]);

        $noticia->update($id, [
            'estado'    => $post['estado'],
            'motivo'    => $post['motivo'],
            'fecha'     => $fechaHora,
        ]);

        $seguimiento->insert([
            'id_noticia'           => $datos['id'],
            'id_usuario'           => $datos['editor_id'],
            'id_categoria_seg'     => $datos['categoria_id'],
            'titulo_seg'           => $datos['titulo'],
            'descripcion_seg'      => $datos['descripcion'],
            'imagen_seg'           => $datos['imagen'],
            'activo_seg'           => $datos['noticia_activa'],
            'estado_seg'           => $post['estado'],
            'usuario_modificacion' => $usuario_nombre,
            'tipo_modificacion'    => 'edicion',
            'revertido'            => false,
        ]);

        return redirect()->to(base_url('validar'));
    }

    public function corregir($id)
    {
        $now = Time::now();
        $fechaHora = $now->format('Y-m-d H:i:s');
        $session = session();
        $usuario_nombre = $session->get('nombre_usuario');

        $post = $this->request->getPost(['estado']);

        $db = \Config\Database::connect();
        $builder = $db->table('noticias');

        $datos = $builder->where('id', $id)->get()->getRowArray();

        $builderSeg = $db->table('seguimiento');

        $builderSeg->insert([
            'id_noticia'           => $datos['id'],
            'id_usuario'           => $datos['editor_id'],
            'id_categoria_seg'     => $datos['categoria_id'],
            'titulo_seg'           => $datos['titulo'],
            'descripcion_seg'      => $datos['descripcion'],
            'imagen_seg'           => $datos['imagen'],
            'activo_seg'           => $datos['noticia_activa'],
            'estado_seg'           => $datos['estado'],
            'usuario_modificacion' => $datos['editor_id'],
            'tipo_modificacion'    => 'creacion',
            'revertido'            => false,
        ]);

        $builder->where('id', $id)->update([
            'estado'    => $post['estado'],
            'fecha'     => $fechaHora,
        ]);

        $builderSeg->insert([
            'id_noticia'           => $datos['id'],
            'id_usuario'           => $datos['editor_id'],
            'id_categoria_seg'     => $datos['categoria_id'],
            'titulo_seg'           => $datos['titulo'],
            'descripcion_seg'      => $datos['descripcion'],
            'imagen_seg'           => $datos['imagen'],
            'activo_seg'           => $datos['noticia_activa'],
            'estado_seg'           => $post['estado'],
            'usuario_modificacion' => $usuario_nombre,
            'tipo_modificacion'    => 'edicion',
            'revertido'            => false,
        ]);

        return redirect()->to(base_url('validar'));
    }

    public function publicar($id)
    {
        $now = Time::now();
        $fechaHora = $now->format('Y-m-d H:i:s');
        $fecha_expiracion = date('Y-m-d H:i:s', strtotime($fechaHora . ' + 5 days'));
        $session = session();
        $usuario_nombre = $session->get('nombre_usuario');


        $post = $this->request->getPost(['estado']);

        var_dump($post);

        $seguimiento = new SeguimientoModel();
        $noticia = new NoticiasModel();

        $datos = $noticia->find($id);

        $seguimiento->insert([
            'id_noticia'           => $datos['id'],
            'id_usuario'           => $datos['editor_id'],
            'id_categoria_seg'     => $datos['categoria_id'],
            'titulo_seg'           => $datos['titulo'],
            'descripcion_seg'      => $datos['descripcion'],
            'imagen_seg'           => $datos['imagen'],
            'activo_seg'           => $datos['noticia_activa'],
            'estado_seg'           => $datos['estado'],
            'usuario_modificacion' => $datos['editor_id'],
            'tipo_modificacion'    => 'creacion',
            'revertido'            => false,
        ]);

        if ($noticia->update($id, [
            'estado'                => $post['estado'],
            'fecha_publicacion'     => $fechaHora,
            'fecha_expiracion'      => $fecha_expiracion,
        ])) {
            echo "La noticia se actualizó correctamente.";
        } else {
            echo "Hubo un error al actualizar la noticia.";
        }

        $seguimiento->insert([
            'id_noticia'           => $datos['id'],
            'id_usuario'           => $datos['editor_id'],
            'id_categoria_seg'     => $datos['categoria_id'],
            'titulo_seg'           => $datos['titulo'],
            'descripcion_seg'      => $datos['descripcion'],
            'imagen_seg'           => $datos['imagen'],
            'activo_seg'           => $datos['noticia_activa'],
            'estado_seg'           => $post['estado'],
            'usuario_modificacion' => $usuario_nombre,
            'tipo_modificacion'    => 'edicion',
            'revertido'            => false,
        ]);

        return redirect()->to(base_url('validar'));
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
        helper(['form']);
        $now = Time::now();
        $fechaHora = $now->format('Y-m-d H:i:s');
        $session = session();
        $id_usuario = $session->get('id');
        $usuario_nombre = $session->get('nombre_usuario');

        if (!$this->request->is('put') || $id == null) {
            return redirect()->route('noticias');
        }

        $reglas = [
            'titulo' => [
                'label' => 'titulo',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El {field} es obligatorio'
                ]
            ],

            'descripcion' => [
                'label' => 'descripcion',
                'rules' => 'required',
                'errors' => [
                    'required' => 'La {field} es obligatoria'
                ]
            ],
            'categoria' => [
                'label' => 'categoria',
                'rules' => 'required|is_not_unique[categorias.id]',  // Asegúrate de reemplazar 'categoria1', 'categoria2', 'categoria3' con tus categorías válidas
                'errors' => [
                    'required' => 'Seleccione al menos una {field}',
                    'in_list' => 'Debe seleccionar una {field} existente.'
                ]
            ],

            'imagen' => [
                'label' => 'imagen',
                'rules' => 'mime_in[imagen,image/jpg,image/jpeg,image/gif,image/png]|max_size[imagen,4096]',
                'errors' => [
                    'mime_in[imagen]' => ' Se requiere de una {field} que contenga las extensiones jpg, jpeg, gif y png',
                    'max_size[imagen]' => 'La {field} es demasiado pesada'
                ]
            ]
        ];

        // Verifica si el formulario cumple con las reglas de validación
        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        // Sube el archivo y obtiene la ruta
        $file = $this->request->getFile('imagen');

        if ($file->isValid() && !$file->hasMoved() && $file->getSize()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $newName);
        } else {
            $newName = '';
        }

        $post = $this->request->getPost(['titulo', 'descripcion', 'categoria', 'es_activo', 'estado']);

        $noticiaModel = new NoticiasModel();
        $seguimiento = new SeguimientoModel();

        $datos_actuales = $noticiaModel->find($id);
        $seguimiento->insert([
            'id_noticia'           => $datos_actuales['id'],
            'id_usuario'           => $datos_actuales['editor_id'],
            'id_categoria_seg'     => $datos_actuales['categoria_id'],
            'titulo_seg'           => $datos_actuales['titulo'],
            'descripcion_seg'      => $datos_actuales['descripcion'],
            'imagen_seg'           => $datos_actuales['imagen'],
            'activo_seg'           => $datos_actuales['noticia_activa'],
            'estado_seg'           => $datos_actuales['estado'],
            'usuario_modificacion' => $usuario_nombre,
            'tipo_modificacion'    => 'creacion',
            'revertido'            => false,
        ]);

        $noticiaModel->update($id, [
            'titulo'           => $post['titulo'],
            'descripcion'      => $post['descripcion'],
            'fecha'            => $fechaHora,  // Guarda la fecha como timestamp
            'noticia_activa'   => $post['es_activo'],
            'estado'           => $post['estado'],
            'categoria_id'     => $post['categoria'],
            'imagen'           => $newName,  // Guarda solo el nombre del archivo
        ]);

        $seguimiento->insert([

            'id_noticia'           => $datos_actuales['id'],
            'id_usuario'           => $datos_actuales['editor_id'],
            'id_categoria_seg'     => $post['categoria'],
            'titulo_seg'           => $post['titulo'],
            'descripcion_seg'      => $post['descripcion'],
            'imagen_seg'           => $newName,
            'activo_seg'           => $post['es_activo'],
            'estado_seg'           => $post['estado'],
            'usuario_modificacion' => $usuario_nombre,
            'tipo_modificacion'    => 'edicion',
            'revertido'            => false,
        ]);

        return redirect()->to(base_url('borradores'));
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
