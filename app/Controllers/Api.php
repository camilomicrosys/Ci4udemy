<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MovieModel;



class Api extends BaseController
{
	public function index()
	{
	$objeto= new MovieModel();
		//primera parte de la paginacion
		 $dato=$objeto->modelando()->getResult('array');
		for($i=0;$i<count($dato);$i++){
         echo $dato[$i]['title'];
         echo "<br>";
         
		}
	}

	

}



