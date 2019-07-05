<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kadarzi extends Model
{
    protected $table = 'kadarzis';
    protected $primaryKey = 'id';
    protected $fillable = [
      'id', 'indikator', 'target', 'target_pencapaian', 'pencapaian', 'total_sasaran', 'targer_sasaran', 'tahun', 'nilai'
    ];
}
