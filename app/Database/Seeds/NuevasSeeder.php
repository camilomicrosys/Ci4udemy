<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NuevasSeeder extends Seeder
{
    public function run()
    {

for($i=0;$i<200;$i++){
 $data = [
            'nombres' => 'Nuevas'.$i,
            
        ];
        // Using Query Builder
        $this->db->table('nuevas')->insert($data);

}

       
        

        
    }
}