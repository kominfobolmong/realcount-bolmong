<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KoperasiResource;
use App\Models\Koperasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KoperasiController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $datas = DB::table('koperasis')
            ->join('kecamatans', 'kecamatans.id', '=', 'koperasis.kecamatan_id')
            ->select('koperasis.id', 'koperasis.nama', 'koperasis.slug', 'koperasis.nomor', 'koperasis.tahun_berdiri', 'koperasis.alamat', 'koperasis.kode', 'koperasis.sertifikat', 'koperasis.status', 'koperasis.created_at', 'kecamatans.nama as kecamatan')
            ->orderBy('koperasis.created_at', 'desc')
            ->paginate(10);

        return new KoperasiResource(true, 'List Data Koperasi', $datas);
    }

    /**
     * show
     *
     * @param  mixed $post
     * @return void
     */
    public function show($id)
    {
        $datas = DB::table('koperasis')
            ->join('kecamatans', 'kecamatans.id', '=', 'koperasis.kecamatan_id')
            ->select('koperasis.id', 'koperasis.nama', 'koperasis.slug', 'koperasis.nomor', 'koperasis.tahun_berdiri', 'koperasis.alamat', 'koperasis.kode', 'koperasis.sertifikat', 'koperasis.status', 'koperasis.created_at', 'kecamatans.nama as kecamatan')
            ->where('koperasis.id', $id)
            ->get();

        return new KoperasiResource(true, 'Detail Data Koperasi', $datas);
    }
}
