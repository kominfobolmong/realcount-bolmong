<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
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
