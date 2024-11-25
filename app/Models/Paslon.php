<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paslon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tipePemilihan()
    {
        return $this->belongsTo(TipePemilihan::class);
    }

    public function hasilGubernurs()
    {
        return $this->hasMany(HasilGubernur::class);
    }

    public function hasilBupatis()
    {
        return $this->hasMany(HasilBupati::class);
    }
}
