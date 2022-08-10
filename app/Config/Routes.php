<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/categoria', 'dashboard/CategoryController::index',['as'=>'categoria']);
$routes->get('/email', 'PhpmailerController::index',['as'=>'PhpmailerController']);



$routes->group('dashboard', function ($routes) {
	/*
    $routes->get('movie', 'dashboard/MovieController::index',['as'=>'movie']);
    $routes->get('mostrarMovies/', 'dashboard/MovieController::mostrarMovies',['as'=>'mostrarMovies']);
    */
   
});



// el curso intermedio crud lo estamos trabajando solo con estas vistas agrpadas  y yano debo estresarme por las demas vistas mejor dicho lo de movies categorias eso puede ignorarse quedo fue con esto por que andres creo una new pero era solo para mostra lo de movies y me perdi entonces segui con este en si esto es loq ue hace todo el crud con imagenes y todo esta en estas clases de estos controllers
$routes->group('new', function ($routes) {
	  $routes->get('inicio','NewController::index',['as'=>'newInicio']);
    $routes->post('create','NewController::create',['as'=>'newCreate']);
    $routes->get('eliminador/(:any)','NewController::eliminarData/$1',['as'=>'newEliminar']);
    $routes->get('editar/(:any)','NewController::editar/$1',['as'=>'neweditar']);
    $routes->post('actualizar','NewController::actualizar',['as'=>'newactualizar']);
   //este es un inner join que se muestra en el index pero como el inner join modifica el paginmate lo cambie para mostrar como se paginan en un inner join entonces cree otro controlador solo con este metodo para guiarme de como hacer un inner join paginado y diferente a mi inner join, tambien chevere
   $routes->get('mostrarpeliculaycategoria','Innersjoins::index',['as'=>'innerjoinsdiferente']);
//esta es la ruta para mostrar imagenes
    $routes->get('mostrarimagenes/(:any)','Mostrarimagenes::index/$1',['as'=>'mostrarimagenes']);
   
   
});
 //esta es una prueba para mostrar una consulta con inner join hecha por mi
 $routes->get('pruebainerjoins','NewController::inerjoins',['as'=>'inerjoins']);

	


 $routes->resource('api');
//esta es el nombre del archivo en el controlador sin poner controller
//$routes->resource('api');


 //esto es manipulacion de imagens nada que ver con los proyectos es unicamente para tener una imagen y aplicarles las propiedades que nos brinda la clase image de codigniter4
 $routes->get('imagenOpcional','Imagenesopcional::image_fit',['as'=>'imagenOpcional']);

//prueba encriptado
$routes->get('encriptado/(:any)','Imagenesopcional::encriptado/$1',['as'=>'encriptado']);
$routes->get('cargando_archivos','Imagenesopcional::cargando_archivos',['as'=>'cargando_archivos']);
$routes->get('pdf','Imagenesopcional::pdf',['as'=>'pdf']);



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
