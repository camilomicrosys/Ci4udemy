<?= $this->extend('dashboard\template\plantillarenderizar') ?>
<?php 

use  App\Models\CategorieModel;
//tambien me traigo el modelo de imagen para mostrar una imagen de este cliente, es solo para aprender como listarla
use App\Models\MovieImageModel;
?>
<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<?php 
foreach($datos->getResult() as $d){
	$id=$d->{'id'};
   $nombres=$d->{'nombres'};
   $descripcion=$d->{'descripcion'};
   $categoria_id=$d->{'categoria_id'};
}


//aca con el categoria  obtendremos el nombre de la categoria que tiene actualmente el cliente esto puede evitarse llamar a la vista si desde la bd hacemos un iner join y simplemente mandamos los datos aca
$data_categori=['id'=>$categoria_id];

$obj= new CategorieModel();

$data=$obj->getDataById($data_categori);
$data= $data->getResult();
$categoria_actual_del_usuario=$data[0]->{'title'};
$id_categoria_actual_del_cliente=$data[0]->{'id'};
?>


<form action="<?= route_to('newactualizar') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" value="<?= $nombres ?>" name="title" /><br />

    <label for="description">Description</label>
    <textarea  name="description" id="description" cols="45" rows="4"><?= $descripcion ?></textarea><br />
    <input name="id" id="id" type="hidden" value="<?= $id ?>">
    <br>
    <label required for="image">Imagen</label>
    <input type="file"  name="image" /><br>
    <br><br>	<strong>categoria actual</strong>
    <input type="text" value="<?= $categoria_actual_del_usuario ?>"><br>	

    <select name="id_categoria" id="id_categoria">
      <?php 	
      foreach($categorias->getResult() as $d){
        $id_categoria= $d->{'id'};
        $titulo_categoria=$d->{'title'};
        /*aca vamos hacer que aparezca en el select la categoria actual del cliente por que si no siempre hay que seleccionar la categoria y si no se selecciona se les guarda simpre la primera cuando actualize
        se utiliza una propiedad llamada selected del html para que parezca por defecto, y hacemso el comparativo de arriba donde traemos la categoria por el id, y solo nos trae la categoria del cliente y aca en este otro foreach estamos recorriendo todas las categorias y vamos a ver cual id coincide con la del foreach de arriba que solo nos trae la el id del cliente
        */
        ?>
        <option <?= $id_categoria_actual_del_cliente==$id_categoria?"- selected":""  ?> value="<?= $id_categoria ?>"><?= $titulo_categoria ?><?= $id_categoria_actual_del_cliente==$id_categoria?"-selected":""  ?></option>
        <?php 	
    }
    ?>
</select>
<br><br>
<input type="submit" name="submit" value="guardar" />
<a href="<?= route_to('newInicio') ?>">regresar</a>
</form>

<?php $objeto_imagen=new  MovieImageModel() ;
  $data=[
    //el id es el id del cliente ya que en la tabla de movie images se le almacena una imagen al id de la persona entonces con este lo buscamos
  'movie_id'=>$id
  ];
    $imagen_a_mostrar=   $objeto_imagen->traerImgPorIdPelicula($data);
 foreach($imagen_a_mostrar->getResult() as $img){
   $imagen= $img->{'image'};
 }
?>




<table>
    <tr>
<th>imagen del cliente</th>
</tr>
<tr>
    <td><img src="<?= route_to('mostrarimagenes',$imagen) ?>" alt=""></td>
</tr>



</table>
