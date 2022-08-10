<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Dompdf\Dompdf;
use Dompdf\Options;
class Imagenesopcional extends BaseController
{
	public function image_fit()
	{
		$image = \Config\Services::image()->withFile(WRITEPATH.'uploads/nueva_carpeta/1645985293_e9d9b3c2516de7ced5e2.jpg')
		->fit(100, 150, 'center')
		->save(WRITEPATH.'uploads/imagen_manipulada/prueba.jpg');
		


	}

	public function encriptado($frase){
		$encrypter = \Config\Services::encrypter();

		$ciphertext = $encrypter->encrypt($frase);

		
		$des= $encrypter->decrypt($ciphertext);
		echo $des; 
		

	}
	public function cargando_archivos(){
		$file = new \CodeIgniter\Files\File(dirname(__DIR__,2).'\public\imagen\images.jpg');
		
		echo $file->getRealPath();

	}

	public function pdf(){

		$mostrar_texto='<h1>funciona el pdf</h1>';

		$options = new Options();
		$options->set('defaultFont', 'Courier');
		$dompdf = new Dompdf($options);
		$dompdf->loadHtml($mostrar_texto);

// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
		$dompdf->render();

// Output the generated PDF to Browser
		$dompdf->stream();
		
	}
}
