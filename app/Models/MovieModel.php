<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table='movies';
    protected $primarykey='id';
  
  public function get($id=null){
   if($id==null){
     return $this->findAll();
     }

     return $this->asArray()->where(['id'=>$id])->first();
  } 

  public function modelando(){
    $builder = $this->db->table('categories');
    return $query   = $builder->get();  
  }
}
