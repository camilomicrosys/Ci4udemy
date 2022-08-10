<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>	</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<a href="<?= route_to('movie')?>">Movie</a>
    <a href="<?= route_to('categoria')?>">categoria</a><br>
    <form action="<?= base_url().'/dashboard/api/create'?>" method="POST">
    	<input type="submit" value="enviar">

    </form>
</body>
</html>