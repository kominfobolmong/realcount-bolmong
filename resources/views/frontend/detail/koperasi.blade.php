@extends('frontend.detail.app', ['menu' => 'Data Koperasi', 'breadcrumb' => 'koperasi'])

@section('content')

{{-- <div class="row gy-4 mb-5">
    <div class="col text-center">
        @foreach ($kecamatan as $item)
        <button type="button" class="btn btn-outline-secondary">{{ $item->nama }}</button>
        @endforeach
    </div>
</div> --}}

<div class="row gy-4">
    <div class="col-md-12">
          <div class="table-responsive">
              <table class="table table-striped data-table-koperasi">
                <thead>
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nomor</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Tahun Berdiri</th>
                          <th scope="col">Kecamatan</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">Wilayah</th>
                          <th scope="col">Sertifikat</th>
                          <th scope="col">Status</th>
                        </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
  </div>

@endsection
