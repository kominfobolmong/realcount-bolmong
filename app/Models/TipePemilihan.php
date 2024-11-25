<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipePemilihan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function paslons()
    {
        return $this->hasMany(Paslon::class);
    }
}
