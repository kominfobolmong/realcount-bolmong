<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HasilGubernurResource;
use App\Models\HasilGubernur;
use App\Models\Tps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilGubernurController extends Controller
{
    /**
     * Get all records.
     */
    public function index()
    {
        $hasilGubernur = HasilGubernur::with(['tps', 'paslon'])->latest()->get();
        return HasilGubernurResource::collection($hasilGubernur);
    }

    /**
     * Store multiple records.
     */
    public function storeBatch(Request $request)
    {
        $validated = $request->validate([
            'data' => 'required|array|min:1',
            'data.*.tps_id' => 'required|exists:tps,id',
            'data.*.paslon_id' => 'required|exists:paslons,id',
            'data.*.suara_sah' => 'required|integer|min:0',
            'data.*.suara_tidak_sah' => 'nullable|integer|min:0',
        ]);

        // Insert all validated data in a single query
        DB::transaction(function () use ($validated) {
            foreach ($validated['data'] as $data) {

                $exists = HasilGubernur::where('tps_id', $data['tps_id'])
                            ->where('paslon_id', $data['paslon_id'])
                            ->exists();

                if ($exists) {
                    throw new \Exception('Duplicate entry for TPS ID ' . $data['tps_id'] . ' and Paslon ID ' . $data['paslon_id']);
                }

                HasilGubernur::create([
                    'tps_id' => $data['tps_id'],
                    'paslon_id' => $data['paslon_id'],
                    'suara_sah' => $data['suara_sah'],
                ]);

                // Perbarui suara_tidak_sah di tabel TPS jika ada
                if (isset($data['suara_tidak_sah'])) {
                    $tps = Tps::find($data['tps_id']);
                    $tps->update([
                        'suara_tidak_sah' => $data['suara_tidak_sah'],
                    ]);
                }
            }
        });

        return response()->json([
            'message' => 'Data Berhasil Disimpan!',
        ], 201);
    }

    public function updateBatch(Request $request)
    {
        $validated = $request->validate([
            'data' => 'required|array|min:1',
            'data.*.id' => 'required|exists:hasil_gubernurs,id',
            'data.*.tps_id' => 'required|exists:tps,id',
            'data.*.paslon_id' => 'required|exists:paslons,id',
            'data.*.suara_sah' => 'required|integer|min:0',
            'data.*.suara_tidak_sah' => 'nullable|integer|min:0',
        ]);

        DB::transaction(function () use ($validated) {
            foreach ($validated['data'] as $data) {
                $record = HasilGubernur::find($data['id']);
                $record->update([
                    'tps_id' => $data['tps_id'],
                    'paslon_id' => $data['paslon_id'],
                    'suara_sah' => $data['suara_sah'],
                ]);

                // Perbarui suara_tidak_sah di tabel TPS jika ada
                if (isset($data['suara_tidak_sah'])) {
                    $tps = Tps::find($data['tps_id']);
                    $tps->update([
                        'suara_tidak_sah' => $data['suara_tidak_sah'],
                    ]);
                }
            }
        });

        return response()->json([
            'message' => 'Data Berhasil Diupdate!',
        ], 201);
    }

    // hitung perolehan suara
    public function getPerolehanSuara()
    {
        // Hitung total suara sah
        $totalSuaraSah = DB::table('hasil_gubernurs')->sum('suara_sah');

        // Ambil data pasangan calon gubernur dengan suara yang mereka peroleh
        $paslonData = DB::table('paslons')
        ->leftJoin('hasil_gubernurs', 'paslons.id', '=', 'hasil_gubernurs.paslon_id')
        ->select(
            'paslons.id as paslon_id',
            'paslons.nomor_urut',
            'paslons.nama_paslon',
            'paslons.nama_calon',
            'paslons.nama_wakil_calon',
            'paslons.foto_url',
            DB::raw('COALESCE(SUM(hasil_gubernurs.suara_sah), 0) as total_suara')
        )
        ->where('paslons.tipe_pemilihan_id', 1)
        ->groupBy('paslons.id', 'paslons.nomor_urut', 'paslons.nama_paslon', 'paslons.nama_calon', 'paslons.nama_wakil_calon', 'paslons.foto_url')
        ->orderBy('total_suara', 'DESC')
        ->get();

        // Hitung persentase
        $paslonData = $paslonData->map(function ($item) use ($totalSuaraSah) {
            $item->presentase = $totalSuaraSah > 0 ? round(($item->total_suara / $totalSuaraSah) * 100, 2) : 0;
            return $item;
        });

        return response()->json([
            'total_suara_sah' => $totalSuaraSah,
            'perolehan_suara' => $paslonData,
        ], 200);
    }
}
