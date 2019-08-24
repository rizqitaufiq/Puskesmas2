<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skdn extends Model
{
    protected $table = 'skdn';
    protected $primaryKey = 'id';
    protected $fillable = [
      'id', 'nama_puskesmas', 'Data_S', 'Data_K', 'Data_D', 'Data_N'
    ];
}
