<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'user_id',
        'nomor_kwh',
        'nama_pelanggan',
        'ref_id_electricityRate',
    ];
}
