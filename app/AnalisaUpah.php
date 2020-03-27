<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalisaUpah extends Model
{
    protected $table = 'analisa_upah';
    protected $primaryKey = 'id_analisa_upah';

    public function upah()
    {
        return $this->belongsTo('App\Upah', 'id_upah', 'id_upah');
    }
}
