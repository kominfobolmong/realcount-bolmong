<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Ukm;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UkmController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:ukm.index|ukm.create|ukm.edit|ukm.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Ukm::latest()->when(request()->q, function ($items) {
            $items = $items->where('nama_perusahaan', 'like', '%' . request()->q . '%');
        })->paginate(15);

        return view('admin.ukm.index', compact('items'));
    }

    public function fetchDesa(Request $request)
    {
        $data['desas'] = Desa::where("kecamatan_id", $request->kecamatan_id)->get(["nama", "id"]);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Kecamatan::get();
        return view('admin.ukm.create', compact('items'));
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
            'tahun' => 'required|numeric',
            'nama_perusahaan' => 'required',
            'nib' => 'required|unique:ukms',
            'nama_pemilik' => 'required',
            'jekel' => 'required',
            'desa_id' => 'required',
            'no_telp' => 'numeric',
        ]);

        $data = Ukm::create([
            'nama_perusahaan' => $request->input('nama_perusahaan'),
            'slug' => Str::slug($request->input('nama_perusahaan'), '-'),
            'nib' => $request->input('nib'),
            'nama_pemilik' => $request->input('nama_pemilik'),
            'tahun' => $request->input('tahun'),
            'jekel' => $request->input('jekel'),
            'alamat' => $request->input('alamat'),
            'desa_id' => $request->input('desa_id'),
            'no_telp' => $request->input('no_telp'),
            'jenis_usaha' => $request->input('jenis_usaha'),
            'keterangan' => $request->input('keterangan'),
            'naker' => $request->input('naker'),
            'aset' => $request->input('aset'),
            'omset' => $request->input('omset'),
            'modal' => $request->input('modal'),
        ]);

        if ($data) {
            //redirect dengan pesan sukses
            return redirect()->route('ukm.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('ukm.index')->with(['error' => 'Data Gagal Disimpan!']);
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
    public function edit(Ukm $ukm)
    {
        $kecamatan = Kecamatan::get();
        $desa = Desa::where("kecamatan_id", $ukm->desa->kecamatan->id)->get();

        return view('admin.ukm.edit', compact('ukm', 'desa', 'kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ukm $ukm)
    {
        $this->validate($request, [
            'tahun' => 'required|numeric',
            'nama_perusahaan' => 'required',
            'nib' => 'required|unique:ukms,nib,' . $ukm->id,
            'nama_pemilik' => 'required',
            'jekel' => 'required',
            'desa_id' => 'required',
            'no_telp' => 'numeric',
        ]);

        $data = Ukm::findOrFail($ukm->id)->update([
            'nama_perusahaan' => $request->input('nama_perusahaan'),
            'slug' => Str::slug($request->input('nama_perusahaan'), '-'),
            'nib' => $request->input('nib'),
            'nama_pemilik' => $request->input('nama_pemilik'),
            'tahun' => $request->input('tahun'),
            'jekel' => $request->input('jekel'),
            'alamat' => $request->input('alamat'),
            'desa_id' => $request->input('desa_id'),
            'no_telp' => $request->input('no_telp'),
            'jenis_usaha' => $request->input('jenis_usaha'),
            'keterangan' => $request->input('keterangan'),
            'naker' => $request->input('naker'),
            'aset' => $request->input('aset'),
            'omset' => $request->input('omset'),
            'modal' => $request->input('modal'),
        ]);

        if ($data) {
            //redirect dengan pesan sukses
            return redirect()->route('ukm.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('ukm.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $data = Ukm::findOrFail($id);
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
