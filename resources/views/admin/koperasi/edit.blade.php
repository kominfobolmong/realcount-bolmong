@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Koperasi</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-file-image"></i> Edit Koperasi</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('koperasi.update', $koperasi->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>NAMA</label>
                                <input type="text" name="nama" value="{{ old('nama', $koperasi->nama) }}" class="form-control @error('nama') is-invalid @enderror">

                                @error('nama')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>KECAMATAN</label>
                                <select class="form-control select-category @error('kecamatan_id') is-invalid @enderror"
                                    name="kecamatan_id">
                                    <option value="">-- PILIH KECAMATAN --</option>
                                    @foreach ($kecamatans as $item)
                                        @if ($koperasi->kecamatan_id === $item->id)
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
                                <label>NOMOR</label>
                                <input type="text" name="nomor" value="{{ old('nomor', $koperasi->nomor) }}" class="form-control @error('nomor') is-invalid @enderror">

                                @error('nomor')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>TAHUN BERDIRI</label>
                                <input type="date" name="tahun_berdiri" value="{{ old('tahun_berdiri', $koperasi->tahun_berdiri) }}" class="form-control @error('tahun_berdiri') is-invalid @enderror">

                                @error('tahun_berdiri')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>ALAMAT</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control @error('alamat') is-invalid @enderror">{!! old('alamat', $koperasi->alamat) !!}</textarea>

                                @error('alamat')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>KODE WILAYAH</label>
                                <input type="text" name="kode" value="{{ old('kode', $koperasi->kode) }}" class="form-control @error('kode') is-invalid @enderror">

                                @error('kode')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="d-block">SERTIFIKAT:</label>
                                <div class="custom-control custom-radio ">
                                    <input type="radio" id="sudah" name="sertifikat" value="Y" class="custom-control-input" @if ($koperasi->sertifikat === 'Y')
                                    checked
                                    @endif>
                                    <label class="custom-control-label" for="sudah">Sudah</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="belum" name="sertifikat" value="N" class="custom-control-input" @if ($koperasi->sertifikat === 'N')
                                    checked
                                    @endif>
                                    <label class="custom-control-label" for="belum">Belum</label>
                                </div>

                                @error('sertifikat')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="d-block">STATUS:</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="aktif" name="status" value="Y" class="custom-control-input" @if ($koperasi->status === 'Y')
                                    checked
                                    @endif>
                                    <label class="custom-control-label" for="aktif">Aktif</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="inactive" name="status" value="N" class="custom-control-input" @if ($koperasi->status === 'N')
                                    checked
                                    @endif>
                                    <label class="custom-control-label" for="inactive">Tidak Aktif</label>
                                </div>

                                @error('status')
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
