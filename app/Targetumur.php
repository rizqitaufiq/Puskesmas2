<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Targetumur extends Model
{
    protected $table = 'targetumur';
    protected $primaryKey = 'id';
    protected $fillable = [
      'id',  'nama_program', 'nama_indikator', 'nama_targetumur'
    ];
}