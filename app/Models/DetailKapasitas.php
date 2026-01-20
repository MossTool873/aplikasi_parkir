<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailKapasitas extends Model
{
    use SoftDeletes;
    protected $table = 'tb_detail_kapasitas';

    protected $fillable = [
        'area_parkir_id',
        'tipe_kendaraan_id',
        'kapasitas',
        'terisi',
    ];

    public function tipeKendaraan()
    {
        return $this->belongsTo(TipeKendaraan::class, 'tipe_kendaraan_id');
    }
}
