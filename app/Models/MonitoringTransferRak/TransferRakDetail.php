<?php

namespace App\Models\MonitoringTransferRak;

use Illuminate\Database\Eloquent\Model;

class TransferRakDetail extends Model
{
    protected $table = 'transfer_rak_details';

    protected $fillable = [
        'transfer_rak_id',
        'kode_rak',
        'waktu_scan',
    ];

    protected $casts = [
        'waktu_scan' => 'datetime',
    ];

    public function transferRak()
    {
        return $this->belongsTo(TransferRak::class, 'transfer_rak_id');
    }
}
