@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Desa</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-file-image"></i> Edit Desa</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('desa.update', $desa->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>KECAMATAN</label>
                                <select class="form-control select-category @error('kecamatan_id') is-invalid @enderror"
                                    name="kecamatan_id">
                                    <option value="">-- PILIH KECAMATAN --</option>
                                    @foreach ($items as $item)
                                    @if ($desa->kecamatan_id === $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                                    @else
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endif
                                    @endforeach
                                </select>

                                @error('kecamatan_id')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>NAMA DESA</label>
                                <input type="text" name="nama" value="{{ old('nama', $desa->nama) }}" class="form-control @error('nama') is-invalid @enderror">

                                @error('nama')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
