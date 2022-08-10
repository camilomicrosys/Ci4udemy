<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NuevasModel;
//este se creo es el mismo index de new controller solo que alla pagino registros como enseñaron y en este cambia el paginador ya que es un inner join entonces me lo replique solo para tenerlo aparte y de ejemplo
class Innersjoins extends BaseController
{
	public function index(){

		$objeto = new NuevasModel();
		
		


		$sesion=session('mensaje');

         //nuevas.* signigica select * from nuevas
		$data=[
			'movies'=>$objeto->asObject()->select('nuevas.*,categories.id as aliasidcategoria')
    ->join('categories','categories.id=nuevas.categoria_id')->paginate(10),
    'pager'=>$objeto->pager,
			'sesion'=>$sesion,
			

		];


		return view('innerjoinsview',$data);
	}
}
