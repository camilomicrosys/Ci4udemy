<?php

namespace App\Controllers;

use App\Models\NuevasModel;
use App\Models\MovieImageModel;
use  App\Models\CategorieModel;
use App\Controllers\BaseController;
class NewController extends BaseController
{
	public function index()
	{
   // $this->cachePage(60);
    
		$categories= new CategorieModel();
		$categorias=$categories->listCategies();

		$objeto = new NuevasModel();
		


		$sesion=session('mensaje');


		$data=[
			
			'sesion'=>$sesion,
			'categorias'=>$categorias,
            'movies'=>$objeto->asObject()->select('nuevas.*,categories.id as aliasidcategoria ,categories.title')
            ->join('categories','categories.id=nuevas.categoria_id')->paginate(2),
            'pager'=>$objeto->pager,

        ];





        return view('new',$data);
      
    }

    public function create(){
         //ponemos el nombre del input del formulario que tiene la imagen
      if ($imagefile = $this->request->getFile('image')) {

         if ($imagefile->isValid() && ! $imagefile->hasMoved()) {
            $newName = $imagefile->getRandomName();
            $imagefile->move(WRITEPATH . 'uploads/nueva_carpeta', $newName);
        }

    }


    $objeto = new NuevasModel();

    if($this->validate('crearNews')){


     $data=[
        'nombres'=>$this->request->getPost('title'),
        'descripcion'=>$this->request->getPost('description'),
        'categoria_id'=>$this->request->getPost('id_categoria'),

    ];

    $id_generado=$objeto->insertando($data);



		//creamos un objeto para guardar modelo de imagen en db
    $imagen= new MovieImageModel();
    $imagen->guardarImagen(['movie_id'=>$id_generado,
        'image'=>$newName,
    ]);
    $mensaje='<div class="alert alert-success" role="alert">
    Pelicula creada exitosamente!
    </div>';
    return redirect()->route('newInicio')->with('mensaje', $mensaje);




}else{
 $validation =  \Config\Services::validation();
 $mensaje='Errores_mios';
 $data=['validation'=>$validation];
 return redirect()->back()->withInput()->with('mensaje', $mensaje);

}








/*
    	echo "datos:";
    	echo $this->request->getPost('title');
    	echo $this->request->getPost('description');
    */

    }



    public function eliminarData($id){
      
       
       

    	$objeto = new NuevasModel();
    	$data=['id'=>$id];
    	$datos=$objeto->eliminar($data);
        //creamos objeto de imagen para eliminar las imagenes de ese id y en el modelo de las imagenes tambien borramos
            $objeto_imagen= new MovieImageModel();
            $data=['movie_id'=>$id];
            //debemos sacar el nombre de la imagen que pertenece a este cliente y la eliminamos de los archivos fisicos con unlinke php
          $datos_imagenes=$objeto_imagen->traerImgPorIdPelicula($data);
          foreach($datos_imagenes->getResult() as $img){
            $nombre_imagen_a_borrar=$img->{'image'};
          }
          $ruta_eliminar= WRITEPATH . 'uploads/nueva_carpeta/'.$nombre_imagen_a_borrar;
         unlink($ruta_eliminar);
        // luego eliminamos todos los registros para este id en la tabla de imagenes por su movie_id
            $data=['movie_id'=>$id];
             $objeto_imagen->eliminarImagenEntablaImagenes($data);

    	return redirect()->route('newInicio')->with('mensaje', 'Registro elimiando exitosamente');

    }

    public function editar($id){
    	$objeto = new NuevasModel();
    	$categories= new CategorieModel();
      $categorias=$categories->listCategies();

      $data=['id'=>$id];
      $datos=$objeto->editar($data);
      $data=[
          'datos'=>$datos,
          'categorias'=>$categorias,
      ];


      return view('newedit',$data);
  }

  public function actualizar(){
     $objeto = new NuevasModel();

     if($this->validate([
      'title'=>'required|min_length[3]|max_length[8]',
      'description'=>'required|min_length[3]|max_length[8]',
      'id_categoria'=>'required',

  ])){


      $data_actualizar_tabla_nuevas=[
       'id'=>$this->request->getPost('id'),
       'nombres'=>$this->request->getPost('title'),
       'descripcion'=>$this->request->getPost('description'),
       'categoria_id'=>$this->request->getPost('id_categoria'),


   ];



   $respuesta_server=$objeto->actualizar($data_actualizar_tabla_nuevas);
   echo $respuesta_server;


    		 //ponemos el nombre del input del formulario que tiene la imagen
   if ($imagefile = $this->request->getFile('image')) {

       if ($imagefile->isValid() && ! $imagefile->hasMoved()) {
        $newName = $imagefile->getRandomName();
        $imagefile->move(WRITEPATH . 'uploads/nueva_carpeta', $newName);
    }

}

$imagen_actualizar_tabla_movie_images=[
    'movie_id'=>$this->request->getPost('id'),
    'image'=>$newName,
];

		//creamos un objeto para actualizar la imane en movie_image con el id
$imagen= new MovieImageModel();
$imagen->actualizarImgBymovieId($imagen_actualizar_tabla_movie_images);
return redirect()->route('newInicio')->with('mensaje', 'actualizado exitosamente');




}else{
  $validation =  \Config\Services::validation();
  $data=['validation'=>$validation];

  return view('new',$data);
 
}

}
public function inerjoins(){
 $objeto = new NuevasModel();
 $data=$objeto->pruebaInerjoin();
 foreach($data->getResult() as $d){
  echo "la imagen es". $imagen=$d->{'image'}. "y pertenece a ".$inombres=$d->{'nombres'};
}

}
}
