<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalisaBahan extends Model
{
    protected $table = 'analisa_bahan';
    protected $primaryKey = 'id_analisa_bahan';

    public function bahan()
    {
        return $this->belongsTo('App\Bahan', 'id_bahan', 'id_bahan');
    }
}
