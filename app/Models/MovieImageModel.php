<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieImageModel extends Model
{
	
	protected $table            = 'movie_images';
	protected $primaryKey       = 'id';
    //estos son los campos que vamos a proteger del formulario
	protected $allowedFields=['movie_id','images'];

	public function guardarImagen($data){
		$builder = $this->db->table('movie_images');
		$builder->insert($data);

	}
	public function actualizarImgBymovieId($data){
		$builder = $this->db->table('movie_images');
		$builder->set($data, false);
		$builder->where('movie_id', $data['movie_id']);
		$builder->update();
	}

	public function traerImgPorIdPelicula($data){
		$builder = $this->db->table('movie_images');
		$builder->where($data);
		return $builder->get();
	}

	public function eliminarImagenEntablaImagenes($data){
		$builder = $this->db->table('movie_images');
    $builder->delete($data);
	}
	
}
