<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/**Home */
$routes->get('/', 'Noticias::index');

/**Registro de usuario */
$routes->get('registro', 'Usuarios::registro',['filter'=>'usuario_autenticado']);
$routes->post('registro/crear', 'Usuarios::crear_cuenta');

/**Iniciar sesion */
$routes->get('iniciar_sesion', 'Usuarios::iniciar_sesion',['filter'=>'usuario_autenticado']);
$routes->get('cerrar_sesion', 'Usuarios::cerrar_sesion',['filter'=>'usuario_autenticar']);
$routes->post('iniciar_sesion/autenticar', 'Usuarios::autenticar');


/**Noticias */
$routes->resource('noticias');
$routes->get('nueva_noticia','Noticias::new',['filter'=>'usuario_autenticar']);
$routes->get('editar_noticia/edit/(:any)', 'Noticias::edit/$1',['filter'=>'usuario_autenticar']);
$routes->get('seguimiento/ver_seguimiento/(:any)', 'Noticias::ver_seguimiento/$1',['filter'=>'usuario_autenticar']);
$routes->get('publicadas' ,'Noticias::mostrar_publicadas',['filter'=>'usuario_autenticar']);
$routes->get('borradores' ,'Noticias::mostrar_borradores',['filter'=>'usuario_autenticar']);
$routes->get('en_correccion' ,'Noticias::mostrar_en_correccion',['filter'=>'usuario_autenticar']);
$routes->get('rechazadas' ,'Noticias::mostrar_rechazadas',['filter'=>'usuario_autenticar']);
$routes->get('editadas' ,'Noticias::mostrar_editadas',['filter'=>'usuario_autenticar']);
$routes->get('desactivadas' ,'Noticias::mostrar_desactivadas',['filter'=>'usuario_autenticar']);
$routes->get('validar' ,'Noticias::validar',['filter'=>'usuario_autenticar']);
$routes->get('rechazar/rechazar_noticia/(:any)', 'Noticias::rechazar_noticia/$1',['filter'=>'usuario_autenticar']);
$routes->get('publicar/publicar_noticia/(:any)', 'Noticias::publicar_noticia/$1',['filter'=>'usuario_autenticar']);
$routes->get('corregir/corregir_noticia/(:any)', 'Noticias::corregir_noticia/$1',['filter'=>'usuario_autenticar']);
$routes->post('noticias/rechazar/(:segment)', 'Noticias::rechazar/$1',['filter'=>'usuario_autenticar']);
$routes->post('noticias/publicar/(:any)', 'Noticias::publicar/$1',['filter'=>'usuario_autenticar']);
$routes->post('noticias/corregir/(:segment)', 'Noticias::corregir/$1',['filter'=>'usuario_autenticar']);

/**Usuarios */
$routes->get('usuario','Usuarios::index',['filter'=>'usuario_autenticar']);
$routes->get('validador','Usuarios::index',['filter'=>'usuario_autenticar']);
