<?php 
/*cuando un controlador esta dentro de una carpeta aca se pone esta y el use para llamar
el base controller y en la ruta tabien se pone la carpeta donde esta mas el nombre de la clase
*/
namespace App\Controllers\dashboard;
use App\Controllers\BaseController;
use App\Models\MovieModel;
class MovieController extends BaseController
{
	public function index()
	{

		$objeto= new MovieModel();
		//primera parte de la paginacion
		$dato=$objeto->asObject()->paginate(10);
		//este pager hace la paginacion
		$pager= $objeto->pager;

		

		$data_header=[
			'titulo'=>'titulo desde controlador'
		];
 //segunda parte de la paginacion
		$data=[
			'dato'=>$dato,
			'pager'=>$pager


		];

		$data_footer=[
			'titulo'=>'titulo header desde controlador',
			'elementos'=>array(1,2,3,4)
		];
		echo view('dashboard/template/header',$data_header);
		echo view('dashboard/movie/index',$data);
		echo view('dashboard/template/footer',$data_footer);

	}

	public function mostrarMovies(){

		$objeto= new MovieModel();
	
		$data=[
			'dato'=>$objeto->asObject()->paginate(5),
			'pager'=>$objeto->pager];


			return view('pruebapaginado',$data);





		}



	}
