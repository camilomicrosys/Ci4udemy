<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>


 <table>
 	<tr>
 	<th>id_pelicula</th>
 	<th>nombre_peli</th>
 	<th>categori_peli</th>
 	
 	</tr>
 	<?php foreach($movies as $m){ ?>
 	<tr>
 		<td><?= $m->{'id'}?></td>
 		<td><?= $m->{'nombres'}?></td>
 		<td><?= $m->{'title'}?></td>

 	</tr>
 <?php } ?>
 </table>


	<?= $pager->links() ?>
	

</body>
</html>