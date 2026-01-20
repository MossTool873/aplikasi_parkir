<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaParkir extends Model
{
    use SoftDeletes;
    protected $table = 'tb_area_parkir';

    protected $fillable = [
        'nama_area',
        'total_kapasitas',
    ];

    public function detailKapasitas() {
        return $this->hasMany(DetailKapasitas::class);
    }
}
