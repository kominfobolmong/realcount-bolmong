<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Kecamatan;
use App\Models\Koperasi;
use Illuminate\Http\Request;

class KoperasiController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:koperasi.index|koperasi.create|koperasi.edit|koperasi.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Koperasi::latest()->when(request()->q, function ($items) {
            $items = $items->where('nama', 'like', '%' . request()->q . '%');
        })->paginate(15);

        return view('admin.koperasi.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Kecamatan::get();
        return view('admin.koperasi.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nomor' => 'required|unique:koperasis',
            'tahun_berdiri' => 'required',
            'kode' => 'required',
            'sertifikat' => 'required',
            'status' => 'required',
            'kecamatan_id' => 'required',
        ]);

        $data = Koperasi::create([
            'nama' => $request->input('nama'),
            'slug' => Str::slug($request->input('nama'), '-'),
            'nomor' => $request->input('nomor'),
            'tahun_berdiri' => $request->input('tahun_berdiri'),
            'alamat' => $request->input('alamat'),
            'kode' => $request->input('kode'),
            'kecamatan_id' => $request->input('kecamatan_id'),
            'sertifikat' => $request->input('sertifikat'),
            'status' => $request->input('status'),
        ]);

        if ($data) {
            //redirect dengan pesan sukses
            return redirect()->route('koperasi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('koperasi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Koperasi $koperasi)
    {
        $kecamatans = Kecamatan::get();
        return view('admin.koperasi.edit', compact('koperasi', 'kecamatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Koperasi $koperasi)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nomor' => 'required|unique:koperasis,nomor,' . $koperasi->id,
            'tahun_berdiri' => 'required',
            'kode' => 'required',
            'sertifikat' => 'required',
            'status' => 'required',
            'kecamatan_id' => 'required',
        ]);

        $data = Koperasi::findOrFail($koperasi->id)->update([
            'nama' => $request->input('nama'),
            'slug' => Str::slug($request->input('nama'), '-'),
            'nomor' => $request->input('nomor'),
            'tahun_berdiri' => $request->input('tahun_berdiri'),
            'alamat' => $request->input('alamat'),
            'kode' => $request->input('kode'),
            'kecamatan_id' => $request->input('kecamatan_id'),
            'sertifikat' => $request->input('sertifikat'),
            'status' => $request->input('status'),
        ]);

        if ($data) {
            //redirect dengan pesan sukses
            return redirect()->route('koperasi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('koperasi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Koperasi::findOrFail($id);
        $data->delete();

        if ($data) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
