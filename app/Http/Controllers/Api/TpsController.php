<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TpsResource;
use App\Models\Tps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TpsController extends Controller
{
    public function index(Request $request)
    {
        $query = Tps::query();

        // Filter berdasarkan nama TPS
        if ($request->has('name')) {
            $query->where('nama_tps', 'like', '%' . $request->name . '%');
        }

        // Filter berdasarkan iddesa
        if ($request->has('desa_id')) {
            $query->where('desa_id', $request->desa_id);
        }

        $tps = $query->get();
        return TpsResource::collection($tps);
    }

    public function show($id)
    {
        $tps = Tps::findOrFail($id);
        return new TpsResource($tps);
    }

    public function getTotalDPT()
    {
        $totalDpt = DB::table('tps')->sum('total_dpt');

        return response()->json([
            'total_dpt' => $totalDpt,
        ], 200);
    }

    public function getTotalSuaraTidakSah()
    {
        $totalSuaraTidakSah = Tps::sum('suara_tidak_sah');

        return response()->json([
            'total_suara_tidak_sah' => $totalSuaraTidakSah,
        ], 200);
    }
}
