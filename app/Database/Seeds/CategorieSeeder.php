<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorieSeeder extends Seeder
{
    public function run()
    {
        // esta sentencia es opcional es para borrar todos los registros de la tabla y luego con el for insertar 20 nuevos registros
            $this->db->table('categories')->delete('id !=',null);

      //Este for lo hice yo para insertar varios registros a la vez

        for($i=0;$i<=20;$i++){
           $data = [
            'title' => 'categoriando '.$i,
              ];
              // Using Query Builder
        $this->db->table('categories')->insert($data);
      
        }
       

        

      
    }
}