<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ImagesSeeder extends Seeder
{
    public function run()
    {
        

      //Este for lo hice yo para insertar varios registros a la vez

        for($i=0;$i<=200;$i++){
           $data = [
            'movie_id' => $i,
            'image'=>'imagenes '.$i
              ];
              // Using Query Builder
        $this->db->table('movie_images')->insert($data);
      
        }
       

        

      
    }
}