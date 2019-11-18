<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    protected $table = 'notif';
    protected $primaryKey = 'id';
    protected $fillable = [
      'id',  'id_puskesmas', 'id_program', 'dibaca', 'tahun'
    ];
}