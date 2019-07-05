<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
    protected $table = 'puskesmas';
    protected $primaryKey = 'id';
    protected $fillable = [
      'id', 'nama_puskesmas'
    ];
}