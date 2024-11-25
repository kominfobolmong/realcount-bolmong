<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UkmResource;
use App\Models\Ukm;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UkmController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $datas = DB::table('ukms')
            ->join('desas', 'desas.id', '=', 'ukms.desa_id')
            ->join('kecamatans', 'kecamatans.id', '=', 'desas.kecamatan_id')
            ->select('ukms.id', 'ukms.nama_perusahaan', 'ukms.slug', 'ukms.nama_pemilik', 'ukms.nib', 'ukms.tahun', 'ukms.alamat', 'ukms.jenis_usaha', 'kecamatans.nama as kecamatan', 'desas.nama as desa')
            ->orderBy('ukms.created_at', 'desc')
            ->paginate(10);

        return new UkmResource(true, 'List Data Ukm', $datas);
    }

    /**
     * show
     *
     * @param  mixed $post
     * @return void
     */
    public function show($id)
    {
        $datas = DB::table('ukms')
            ->join('desas', 'desas.id', '=', 'ukms.desa_id')
            ->join('kecamatans', 'kecamatans.id', '=', 'desas.kecamatan_id')
            ->select('ukms.id', 'ukms.nama_perusahaan', 'ukms.slug', 'ukms.nama_pemilik', 'ukms.nib', 'ukms.tahun', 'ukms.alamat', 'ukms.jenis_usaha', 'kecamatans.nama as kecamatan', 'desas.nama as desa', 'ukms.jekel', 'ukms.naker', 'ukms.aset', 'ukms.omset', 'ukms.modal', 'ukms.keterangan', 'ukms.no_telp', 'ukms.created_at')
            ->where('ukms.id', $id)
            ->get();

        return new UkmResource(true, 'Detail Data Ukm', $datas);
    }
}
