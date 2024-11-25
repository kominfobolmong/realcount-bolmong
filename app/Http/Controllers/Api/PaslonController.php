<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaslonResource;
use App\Models\Paslon;
use Illuminate\Http\Request;

class PaslonController extends Controller
{
    /**
     * Mendapatkan semua paslon.
     */
    public function index()
    {
        $paslon = Paslon::with('tipePemilihan')->orderBy('tipe_pemilihan_id', 'asc')->get();
        return PaslonResource::collection($paslon);
    }

    /**
     * Mendapatkan semua paslon dengan tipe pemilihan gubernur.
     */
    public function paslonGubernur()
    {
        $paslon = Paslon::whereHas('tipePemilihan', function ($query) {
            $query->where('nama_tipe_pemilihan', 'Gubernur');
        })
        ->orderBy('nomor_urut', 'asc')
        ->get();

        return PaslonResource::collection($paslon);
    }

    /**
     * Mendapatkan semua paslon dengan tipe pemilihan bupati.
     */
    public function paslonBupati()
    {
        $paslon = Paslon::whereHas('tipePemilihan', function ($query) {
            $query->where('nama_tipe_pemilihan', 'Bupati');
        })
        ->orderBy('nomor_urut', 'asc')
        ->get();

        return PaslonResource::collection($paslon);
    }
}
