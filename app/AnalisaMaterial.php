<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalisaMaterial extends Model
{
    protected $table = 'analisa_material';
    protected $primaryKey = 'id_analisa_material';

    public function material()
    {
        return $this->belongsTo('App\Material', 'id_material', 'id_material');
    }
}
