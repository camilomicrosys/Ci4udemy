<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Mostrarimagenes extends BaseController
{
    public function index($nombre_imagen)
    {
    
  // abre el archivo en modo binario
 $nombre=WRITEPATH . 'uploads/nueva_carpeta/'.$nombre_imagen;

//abrimos la imagen en modo lectura
$fp = fopen($nombre, 'rb');

// envía las cabeceras correctas
header("Content-Type: image/png");
header("Content-Length: " . filesize($nombre));

// vuelca la imagen y detiene el script
fpassthru($fp);
exit;



    }
}
