<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koperasi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function getSertifikatAttribute($value)
    {
        return $value === 'Y' ? 'Sudah Bersertifikat' : 'Belum Bersertifikat';
    }

    public function getStatusAttribute($value)
    {
        return $value === 'Y' ? 'Aktif' : 'Tidak Aktif';
    }
}
