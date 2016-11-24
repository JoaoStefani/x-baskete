<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noticia extends Model implements SluggableInterface {

	use SoftDeletes;
	use SluggableTrait;

	protected $dates = ['deleted_at'];

	protected $sluggable = [
		'build_from' => 'titulo',
		'save_to'    => 'slug',
	];

	protected $fillable = [
							'id',
							'user_id',
							'user_id_edited',
							'titulo',
							'slug',
							'introducao',
							'conteudo',
							'fonte',
							'imagem'
						   ];

	protected $guarded  = array('id');

	/**
	 * Retorna uma entrada de conteúdo pós formatado,
	 * isso garante que as quebras de linha são retornados.
	 *
	 * @return string
	 */
	public function conteudo()
	{
		return nl2br($this->conteudo);
	}

	/**
	 * Retorna uma entrada de conteúdo pós formatado,
	 * isso garante que as quebras de linha são retornados.
	 *
	 * @return string
	 */
	public function introducao()
	{
		return nl2br($this->introducao);
	}

	/**
	 * Obter o autor do post.
	 *
	 * @return User
	 */
	public function autor()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}
