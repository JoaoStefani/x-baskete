<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercicio extends Model {

    use SoftDeletes;

    public $table = 'exercicio';

    protected $dates = ['deleted_at'];

    protected $guarded  = array('id');

}