<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilBupati extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tps()
    {
        return $this->belongsTo(Tps::class);
    }

    public function paslon()
    {
        return $this->belongsTo(Paslon::class);
    }
}
