<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [

        'nilai',

    ];
    public function siswa()
     {
         return $this->belongsToMany('App\Siswa');
     }
     public function materi()
     {
         return $this->belongsToMany('App\Materi');
     }
}
