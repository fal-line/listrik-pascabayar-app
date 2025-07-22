<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'ref_id_penggunaan',
        'ref_id_pelanggan',
        'bulan',
        'tahun',
        'jumlah_meter',
        'status',
    ];
}
