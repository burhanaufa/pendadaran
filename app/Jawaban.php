<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $fillable= [
        'isi_jawaban', 'isTrue'
    ];
    public function pertanyaan()
    {
        return $this->belongsTo('App\Pertanyaan','foreign_key');
    }
}
