@extends('frontend.detail.app', ['menu' => 'Profil', 'breadcrumb' => 'Struktur Organisasi'])

@section('content')

<div class="section-header">
    <img src="{{ Storage::url($item->struktur_organisasi ?? null) }}" class="img-fluid rounded-4" alt="struktur-organisasi">
</div>

@endsection
