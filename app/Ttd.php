<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ttd extends Model
{
    protected $table = 'ttd';
    protected $primaryKey = 'id';
    protected $fillable = [
      'id', 'indikator', 'target', 'target_pencapaian', 'pencapaian', 'total_sasaran', 'targer_sasaran', 'tahun', 'nilai'
    ];
}
