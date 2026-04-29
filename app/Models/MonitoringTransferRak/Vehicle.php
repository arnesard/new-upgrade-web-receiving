<?php

namespace App\Models\MonitoringTransferRak;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';

    protected $fillable = [
        'nama_kendaraan',
    ];
}
