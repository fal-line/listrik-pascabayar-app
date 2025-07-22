<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'email',
        'tarif',
        'nomor_kwh',
        'nama_pelanggan',
        'ref_id_electricityRate',
    ];

    protected $hidden = [
        'password',
    ];
}
