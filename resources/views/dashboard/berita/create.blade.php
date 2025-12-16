@extends('dashboard.layout')

@section('content')
<h3>Tambah Berita</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ url('/dashboard/berita') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Judul Berita</label>
        <input type="text"
               name="judul"
               class="form-control"
               value="{{ old('judul') }}"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <input type="text"
               name="kategori"
               class="form-control"
               value="{{ old('kategori') }}"
               placeholder="Politik / Ekonomi / Olahraga"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Hashtag (opsional)</label>
        <input type="text"
               name="hashtag"
               class="form-control"
               value="{{ old('hashtag') }}"
               placeholder="#laravel #berita">
    </div>

    <div class="mb-3">
        <label class="form-label">Isi Berita</label>
        <textarea name="isi"
                  rows="6"
                  class="form-control"
                  required>{{ old('isi') }}</textarea>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ url('/dashboard/berita') }}"
           class="btn btn-secondary">
            Kembali
        </a>
    </div>
</form>
@endsection