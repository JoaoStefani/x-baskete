<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model{

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public $table = 'banners';

	protected $guarded  = array('id');

	public function autor()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

}