<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kabupaten;
use App\Http\Resources\KabupatenResource;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    public function index(Request $request)
    {
        $query = Kabupaten::query();

        // Filter berdasarkan nama kabupaten
        if ($request->has('name')) {
            $query->where('nama_kabupaten', 'like', '%' . $request->name . '%');
        }

        // Load relasi kecamatan
        if ($request->has('with_kecamatan')) {
            $query->with('kecamatans');
        }

        $kabupaten = $query->get();
        return KabupatenResource::collection($kabupaten);
    }

    public function show($id, Request $request)
    {
        $kabupaten = Kabupaten::with('kecamatans')->findOrFail($id);
        return new KabupatenResource($kabupaten);
    }
}
