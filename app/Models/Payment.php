<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'ref_id_tagihan',
        'bulan_bayar',
        'biaya_admin',
        'total_bayar',
        'ref_admin',
    ];

    protected $primaryKey = 'id_bayar';
}
