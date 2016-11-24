<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;
    public $table = 'videos';

    protected $dates = ['deleted_at'];

    protected $fillable = [
                            'id',
                            'user_id',
                            'user_id_edited',
                            'link'
                          ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
