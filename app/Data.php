<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';
    protected $primaryKey = 'id';
    protected $fillable = [
      'id', 'user','nama_program','nama_indikator', 'nama_targetumur', 'target_pencapaian', 'pencapaian', 'total_sasaran', 'targer_sasaran', 'tahun', 'nilai', 'adequasi_effort', 'adequasi_peformance', 'progress', 'sensitivitas', 'spesifitas', 'hasil'
    ];
}
