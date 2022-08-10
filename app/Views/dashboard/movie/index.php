<table style="border: solid 1px;">
	<tr>
		<th>Id</th>
		<th>Nombre</th>
		<th>Opciones</th>
	</tr>

	<?php foreach($dato as $d){ ?>
	<tr>
		<td><?= $d->{'id'}?></td>
		<td><?= $d->{'title'}?></td>
		<td><?= $d->{'description'}?></td>
	</tr>
<?php } ?>
</table>

<br>
<?= $pager->links() ?>