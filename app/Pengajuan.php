<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    protected $primaryKey = 'id_pengajuan';

    protected $attributes = [
        'status_pengajuan' => 'pending', // Proposal: status_pengajuan = {pending, accepted, rejected}
    ];
}
