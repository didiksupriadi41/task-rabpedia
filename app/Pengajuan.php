<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    protected $primaryKey = 'id_pengajuan';

    protected $attributes = [
        'status_pengajuan' => 'Pending', // status_pengajuan = {Pending, Accepted, Rejected}
    ];
}
