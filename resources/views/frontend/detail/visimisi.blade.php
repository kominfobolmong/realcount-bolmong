@extends('frontend.detail.app', ['menu' => 'Profil', 'breadcrumb' => 'Visi Misi'])

@section('content')

<div class="section-header">
    <h2>Visi</h2>
    <p>{!! $item->visi ?? null !!}</p>
</div>

<div class="section-header">
    <h2>Misi</h2>
    <p>{!! $item->misi ?? null !!}</p>
</div>

@endsection
