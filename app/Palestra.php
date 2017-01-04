<?php

namespace SeCoT;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Palestra extends Model
{
	use SoftDeletes;

    protected $fillable = array('titulo', 'palestrante', 'data', 'descricao', 'limite', 'inscritos');

    protected $dates = ['deleted_at'];
}
