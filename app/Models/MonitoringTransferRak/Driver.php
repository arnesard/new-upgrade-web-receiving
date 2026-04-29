<?php

namespace App\Models\MonitoringTransferRak;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'drivers';

    protected $fillable = [
        'nama_karyawan',
    ];
}
