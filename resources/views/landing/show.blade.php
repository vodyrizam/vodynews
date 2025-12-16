@extends('layouts.app')
@section('title',$berita->judul)
@section('content')
<h1>{{ $berita->judul }}</h1>
<p class="text-muted">
{{ $berita->kategori }} | {{ $berita->tanggal_publikasi->format('d M Y') }} |
Dilihat {{ $berita->viewed }}x
</p>
<hr>
<div>{!! nl2br(e($berita->isi)) !!}</div>
<p class="mt-3"><strong>Hashtag:</strong> {{ $berita->hashtag }}</p>
@endsection