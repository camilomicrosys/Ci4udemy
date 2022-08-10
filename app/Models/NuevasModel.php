<?php

namespace App\Models;

use CodeIgniter\Model;

class NuevasModel extends Model
{
    protected $table='nuevas';
    protected $primarykey='id';
    // esto son los nombres de los campos de formularios que ingresaran o a un actualizado o insertado para que sean limpiados y protegidos
    protected $allowedFields = ['title', 'description','id_categoria'];
  public function get($id=null){
   if($id==null){
     return $this->findAll();
     }

     return $this->asArray()->where(['id'=>$id])->first();
  } 

  public function mostrando(){
    $builder = $this->db->table('nuevas');
    return $query   = $builder->get();  
  }

  public function insertando($data){
    $builder = $this->db->table('nuevas');
    $builder->insert($data);
    return $this->db->insertID();
  }
  public function eliminar($data){
    $builder = $this->db->table('nuevas');
    $builder->delete($data);

  }

  public function editar($data){
 $builder = $this->db->table('nuevas');
  return $query= $builder->where($data)->get();
  }

  public function actualizar($data){
 $builder = $this->db->table('nuevas');
$builder->set($data, false);
$builder->where('id', $data['id']);
$builder->update();
if($this->db->transStatus()==false){
echo "error db";
}else{
  echo "exitoso db";
}
  }

  public function pruebaInerjoin(){
     $builder = $this->db->table('nuevas');
     $builder->select('*');
     $builder->join('movie_images', 'movie_images.movie_id = nuevas.id');
     $builder->where('movie_images.movie_id','17');
     return $query = $builder->get();
  }

  public function mostrarcategoriaenlistadodepelicula(){
    return $this->asArray()->select('*')
    ->join('categories','categories.id=nuevas.categoria_id')->first();
  }
}