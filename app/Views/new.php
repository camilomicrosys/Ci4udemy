<?php // en template en las vistas creamos un header y footer ahora aca heredamos esas plantillas y renderisamos los contenidos ?>
<?= $this->extend('dashboard\template\plantillarenderizar') ?>
<?php //aca estamos ramando a una vista estatica entonces la inclimos la cual es la barra de navegacion ?>

<?= $this->section('micontenido') ?>

<?= session()->getFlashdata('error') ?>
<?php //aca metemos el alert de boostrap para que nos muestre alert cuando hayan errores ?>

<?php
if($sesion =='Errores_mios'){
echo $alert_error_boostrap='<div class="alert alert-danger" role="alert">
  '. service('validation')->listErrors().'
</div>'; 
}else{
 
}

?>

<form action="<?= route_to('newCreate') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input value="<?= old('title') ?>" id="title" type="input"  name="title" /><br />

    <label for="description">Description</label>
    <textarea   name="description" id="description" cols="45" rows="4"> <?= old('description') ?></textarea><br />
    <label for="image">Imagen</label>
    <input type="file" name="image" />
    <br>
    <br>
    <select name="id_categoria" id="id_categoria">
      <?php 	
      foreach($categorias->getResult() as $d){
        $id_categoria= $d->{'id'};
        $titulo_categoria=$d->{'title'};
        ?>
        <option value="<?= $id_categoria ?>"><?= $titulo_categoria ?></option>
        <?php 	
    }

    ?>
</select>
<br><br>
<input type="submit" name="submit" value="guardar" />
</form>

<?php 	
if(isset($sesion)){
	echo "el mensaje flash recibido es ".$sesion;
}
echo "<br>";
?>




<?php 
if(isset($movies)){
    ?>
    <table class="table table-dark container">
        <tr>
            <th>id_pelicula</th>
            <th>nombre_peli</th>
            <th>categori_peli</th>
            <th>nombre_categoria</th>

            <?php foreach($movies as $m){ ?>  

               <tr>
                <td><?= $m->{'id'}?></td>
                <td><?= $m->{'nombres'}?></td>
                <td><?= $m->{'aliasidcategoria'}?></td>
                <td><?= $m->{'title'}?></td>


                <td><a class="btn btn-danger"  href="<?= route_to('newEliminar',$m->{'id'}) ?>">Eliminar</a></td>
                <td><a class="btn btn-success" href="<?= route_to('neweditar',$m->{'id'}) ?>">Editar</a></td>
            </tr>
        <?php } ?>
    </table>

    <?php 	 


}


?>


<div class="text-center">
    <?= $pager->links() ?>
</div>






<?= $this->endSection() ?>

<?= $this->section('scriptsfooter') ?>
<?= $this->endSection() ?>