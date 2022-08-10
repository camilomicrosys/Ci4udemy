<?php

namespace App\Models;

use CodeIgniter\Model;

class CategorieModel extends Model
{
   
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    public function get($id=null){
   if($id==null){
     return $this->findAll();
     }

     return $this->asArray()->where(['id'=>$id])->first();
  } 

  public function listCategies(){
  $builder = $this->db->table('categories');
    return $query   = $builder->get(); 
  }
  public function getDataById($data){
  	$builder = $this->db->table('categories');
  return $query= $builder->where($data)->get();
  }
    
}
