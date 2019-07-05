<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $table = 'indikator';
    protected $primaryKey = 'id';
    protected $fillable = [
      'id', 'nama_program', 'nama_indikator'
    ];
}