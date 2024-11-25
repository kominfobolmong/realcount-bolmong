<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:desa.index|desa.create|desa.edit|desa.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Desa::latest()->when(request()->q, function ($items) {
            $items = $items->where('nama', 'like', '%' . request()->q . '%');
        })->paginate(15);

        return view('admin.desa.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Kecamatan::get();
        return view('admin.desa.create', compact('items'));
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
            'nama' => 'required|string|unique:desas',
            'kecamatan_id' => 'required',
        ]);

        $data = Desa::create([
            'kecamatan_id' => $request->input('kecamatan_id'),
            'nama' => $request->input('nama'),
        ]);

        if ($data) {
            //redirect dengan pesan sukses
            return redirect()->route('desa.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('desa.index')->with(['error' => 'Data Gagal Disimpan!']);
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
    public function edit(Desa $desa)
    {
        $items = Kecamatan::get();
        return view('admin.desa.edit', compact('desa', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desa $desa)
    {
        $this->validate($request, [
            'nama' => 'required|string|unique:desas,nama,' . $desa->id,
            'kecamatan_id' => 'required',
        ]);

        $data = Desa::findOrFail($desa->id)->update([
            'kecamatan_id' => $request->input('kecamatan_id'),
            'nama' => $request->input('nama'),
        ]);

        if ($data) {
            //redirect dengan pesan sukses
            return redirect()->route('desa.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('desa.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $data = Desa::findOrFail($id);
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
