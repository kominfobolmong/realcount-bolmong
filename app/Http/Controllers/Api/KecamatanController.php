<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Http\Resources\KecamatanResource;

class KecamatanController extends Controller
{
    public function index(Request $request)
    {
        $query = Kecamatan::query();

        // Filter berdasarkan nama kecamatan
        if ($request->has('name')) {
            $query->where('nama_kecamatan', 'like', '%' . $request->name . '%');
        }

        // Filter berdasarkan idkabupaten
        if ($request->has('kabupaten_id')) {
            $query->where('kabupaten_id', $request->kabupaten_id);
        }

        // Load relasi desa
        if ($request->has('with_desa')) {
            $query->with('desas');
        }

        $kecamatan = $query->get();
        return KecamatanResource::collection($kecamatan);
    }

    public function show($id, Request $request)
    {
        $kecamatan = Kecamatan::with('desas')->findOrFail($id);
        return new KecamatanResource($kecamatan);
    }
}
