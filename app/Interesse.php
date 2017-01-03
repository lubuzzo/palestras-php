<?php

namespace SeCoT;

use Illuminate\Database\Eloquent\Model;

class Interesse extends Model
{
    protected $fillable = array('id_pessoa', 'id_palestra', 'presenca');
}
