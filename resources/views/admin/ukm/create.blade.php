@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah UKM</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-file-image"></i> Tambah UKM</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('ukm.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>TAHUN</label>
                                <input type="text" maxlength="4" name="tahun" value="{{ old('tahun') }}" class="form-control @error('tahun') is-invalid @enderror">

                                @error('tahun')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>NAMA PERUSAHAAN</label>
                                <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" class="form-control @error('nama_perusahaan') is-invalid @enderror">

                                @error('nama_perusahaan')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>NIB</label>
                                <input type="text" name="nib" value="{{ old('nib') }}" class="form-control @error('nib') is-invalid @enderror">

                                @error('nib')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>NAMA PEMILIK</label>
                                <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik') }}" class="form-control @error('nama_pemilik') is-invalid @enderror">

                                @error('nama_pemilik')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="d-block">JENIS KELAMIN:</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="pria" name="jekel" value="L" class="custom-control-input">
                                    <label class="custom-control-label" for="pria">Laki laki</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="wanita" name="jekel" value="P" class="custom-control-input">
                                    <label class="custom-control-label" for="wanita">Perempuan</label>
                                </div>

                                @error('jekel')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>KECAMATAN</label>
                                <select id="kecamatan-dropdown" class="form-control select-category @error('kecamatan_id') is-invalid @enderror">
                                    <option value="">-- PILIH KECAMATAN --</option>
                                    @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>

                                @error('kecamatan_id')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>DESA/KELURAHAN</label>
                                <select id="desa-dropdown" class="form-control select-category @error('desa_id') is-invalid @enderror" name="desa_id">
                                    <option value="">-- PILIH DESA/KELURAHAN --</option>
                                </select>

                                @error('desa_id')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>ALAMAT</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control @error('alamat') is-invalid @enderror"></textarea>

                                @error('alamat')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>NOMOR TELEPON</label>
                                <input type="text" name="no_telp" value="{{ old('no_telp') }}" class="form-control @error('no_telp') is-invalid @enderror">

                                @error('no_telp')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>JENIS USAHA</label>
                                <textarea name="jenis_usaha" id="jenis_usaha" cols="30" rows="10" class="form-control @error('jenis_usaha') is-invalid @enderror"></textarea>

                                @error('jenis_usaha')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>KETERANGAN</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control @error('keterangan') is-invalid @enderror"></textarea>

                                @error('keterangan')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>NAKER</label>
                                <input type="number" name="naker" value="{{ old('naker') ?? 0 }}" class="form-control @error('naker') is-invalid @enderror">

                                @error('naker')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>ASET</label>
                                <input type="number" name="aset" value="{{ old('aset') ?? 0 }}" class="form-control @error('aset') is-invalid @enderror">

                                @error('aset')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>OMSET</label>
                                <input type="number" name="omset" value="{{ old('omset') ?? 0 }}" class="form-control @error('omset') is-invalid @enderror">

                                @error('omset')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>MODAL</label>
                                <input type="number" name="modal" value="{{ old('modal') ?? 0 }}" class="form-control @error('modal') is-invalid @enderror">

                                @error('modal')
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
