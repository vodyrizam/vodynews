@extends('layouts.app')
@section('title','Beranda')
@section('content')
<h1 class="mb-3">Portal Berita</h1>
<p>Total Berita Dipublikasikan: <strong>{{ $total }}</strong></p>
<div class="row">
@foreach($latest as $item)
<div class="col-md-4 mb-3">
<div class="card h-100">
<div class="card-body">
<h5 class="card-title">{{ $item->judul }}</h5>
<p class="text-muted">{{ $item->kategori }} | {{ $item->tanggal_publikasi->format('d M Y') }}</p>
<a href="/berita/{{ $item->slug }}" class="btn btn-sm btn-
primary">Baca</a>
</div>
</div>
</div>
@endforeach
</div>
@endsection