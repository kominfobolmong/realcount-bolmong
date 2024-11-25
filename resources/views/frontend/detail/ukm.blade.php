@extends('frontend.detail.app', ['menu' => 'Data Ukm', 'breadcrumb' => 'UKM'])

@section('content')

{{-- <div class="row gy-4 mb-5">
    <div class="col text-center">
        @foreach ($kecamatan as $item)
        <button type="button" class="btn btn-outline-secondary">{{ $item->nama }}</button>
        @endforeach
    </div>
</div> --}}

<div class="row gy-4">

    <div class="col">

          <div class="table-responsive">
              <table class="table table-striped data-table-ukm">
                <thead>
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">UKM</th>
                          <th scope="col">Nama</th>
                          <th scope="col">NIB</th>
                          <th scope="col">Kecamatan</th>
                          <th scope="col">Desa/Kelurahan</th>
                          <th scope="col">Jenis Usaha</th>
                          <th scope="col">Tahun</th>
                          {{-- <th scope="col">Detail</th> --}}
                        </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>
  </div>

@endsection
