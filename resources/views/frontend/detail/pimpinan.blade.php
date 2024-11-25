@extends('frontend.detail.app', ['menu' => 'Profil', 'breadcrumb' => 'Profil Pimpinan'])

@section('content')

<div class="row gy-4">
    <div class="col-lg-6">
      <img src="{{ Storage::url($item->foto_pimpinan ?? null) }}" class="img-fluid rounded-4" alt="foto-pimpinan">
    </div>
    <div class="col-lg-6">
        <h3>Kata Sambutan</h3>
        <p>{!! $item->kata_sambutan ?? null !!}</p>
    </div>
  </div>

@endsection

