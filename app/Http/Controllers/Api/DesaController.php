<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DesaResource;
use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function index(Request $request)
    {
        $query = Desa::query();

        // Filter berdasarkan nama desa
        if ($request->has('name')) {
            $query->where('nama_desa', 'like', '%' . $request->name . '%');
        }

        // Filter berdasarkan idkecamatan
        if ($request->has('kecamatan_id')) {
            $query->where('kecamatan_id', $request->kecamatan_id);
        }

        // Load relasi TPS
        if ($request->has('with_tps')) {
            $query->with('tps');
        }

        $desa = $query->get();
        return DesaResource::collection($desa);
    }

    public function show($id, Request $request)
    {
        $desa = Desa::with('tps')->findOrFail($id);
        return new DesaResource($desa);
    }
}
